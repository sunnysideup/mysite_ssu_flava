#!/bin/bash


files=(
    "."
    "moduleA"
    "moduleB"
)


DIR=`pwd`

for i in "${files[@]}"
do
        cd $DIR/$i/
        echo "_____________________________"`pwd`"_____________________________"
        git pull origin master -q
        git commit  -q
        git add . -A
        git commit . -m "fixes" -q
        git push origin master -q
done

cd $DIR

composer update
