#!/bin/bash

# Generate the two documents
asciidoctor specifikacio.adoc
tj3 weshu-d8.tjp

# Merge the specification and project plan together

SPEC="specifikacio.html"
PLAN1="Overview.html"
PLAN2="Status.html"
OUTPUT="index.html"

CSS='<link href="css/weshu-d8.css" rel="stylesheet" type="text/css"></link>'
JS='<script src="scripts/wz_tooltip.js" type="text/javascript"></script>'

# insert CSS after </style>
number=$(grep -n '</style>' $SPEC | cut -d: -f 1)
head -n $number $SPEC >$OUTPUT
echo $CSS >>$OUTPUT
((number++))
tail -n +$number $SPEC >>$OUTPUT

# insert JS after <body>
TEMP=$(tempfile)
number=$(grep -n '<body' $OUTPUT | cut -d: -f 1)
head -n $number $OUTPUT >$TEMP
echo $JS >>$TEMP
# ((number++))
tail -n +$number $SPEC >>$TEMP
mv $TEMP $OUTPUT

# insert plan1 after Ütemezés
TEMP=$(tempfile)
number=$(grep -n '<h3.*_Ütemezés' $OUTPUT | cut -d: -f 1)
head -n $number $OUTPUT >$TEMP
# create trimmed plan1
TEMP2=$(tempfile)
tail -n +$(grep -n 'tj_table_frame' $PLAN1 | cut -d: -f 1) $PLAN1 >$TEMP2
TEMP3=$(tempfile)
tac $TEMP2 >$TEMP3
tail -n +$(grep -n ' <\/table>$' $TEMP3 | cut -d: -f 1) $TEMP3 | tac >>$TEMP
rm $TEMP2 $TEMP3
((number++))
tail -n +$number $OUTPUT >>$TEMP
mv $TEMP $OUTPUT

# insert plan2 after Feladatok állapota
TEMP=$(tempfile)
number=$(grep -n '<h3.*_feladatok_állapota' $OUTPUT | cut -d: -f 1)
head -n $number $OUTPUT >$TEMP
# create trimmed plan2
TEMP2=$(tempfile)
tail -n +$(grep -n 'Dynamic Report ID: 0\.0' $PLAN2 | cut -d: -f 1) $PLAN2 >$TEMP2
TEMP3=$(tempfile)
tac $TEMP2 >$TEMP3
number2=$(grep -n -B1 '</table>' $TEMP3 | grep '</div></td></tr></table>$' | cut -d: -f 1)
((number2++))
tail -n +$number2 $TEMP3 | tac >>$TEMP
rm $TEMP2 $TEMP3
((number++))
tail -n +$number $OUTPUT >>$TEMP
mv $TEMP $OUTPUT


chown udi:www-data $OUTPUT
chmod 640 $OUTPUT
