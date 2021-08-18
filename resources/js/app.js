require('./bootstrap');
import $ from "jquery";
$(function (){
    $post(ajax_url,{_token:token},function (response){
        console.log(response);
    },'json');
})
