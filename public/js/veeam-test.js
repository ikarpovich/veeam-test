/**
 * Veeam Software Test Application
 *
 * @link      https://github.com/ikarpovich/veeam-test
 * @copyright Copyright (c) 2014, Igor Karpovich
 * @license   GPL v2
 */

$(function(){

    $(".job-list .list-group-item").click(function(){
        $(this).find(".job-description").toggle();
    });

});