<?php



function layout(){
    return \Request::is('admin/*') ? 'layouts.defaultAdmin' : 'layouts.default';
}