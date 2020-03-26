#!/bin/bash

repos=(app core ats auth pim ui)

for repo in "${repos[@]}"
do
    cd ../"${repo}"

    echo ""
    echo "${repo}"

    git add .
    git stash
    git checkout develop
    git pull

done
