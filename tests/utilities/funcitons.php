<?php

function create($model, $attr = [])
{
    return factory($model)->create($attr);
}

function make($model, $attr = [])
{
    return factory($model)->make($attr);
}