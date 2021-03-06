/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************************!*\
  !*** ./resources/js/achievement-crafting.js ***!
  \**********************************************/
$(function () {
  $(".craft-btn").click(aNotif);
  $("#searchBtn").click(searchMaterial);
  $("#keyword").on("keyup", function (event) {
    if (event.keyCode === 13) {
      event.preventDefault();
      $("#searchBtn").click();
    }
  });
});

function aNotif() {
  var id = $(this).attr('id');
  $.confirm({
    title: '',
    boxWidth: '400px',
    useBootstrap: false,
    type: 'blue',
    content: "\n<div class=\"text-6xl text-center text-blue-400 my-4\">\n    <i class=\"fas fa-exclamation\"></i>\n</div>\n<div class=\"text-xl text-center font-bold\">\n    Are You Sure?\n</div>\n<div class=\"text-lg\">\n    Do you really want to craft this achievement?\n</div>",
    buttons: {
      yes: {
        text: 'Yes',
        btnClass: 'btn-green',
        action: function action() {
          $.ajax({
            url: '/achievement-crafting',
            method: 'post',
            data: {
              achievement_id: id
            }
          }).done(function (response) {
            if (response == 0) {
              $.alert({
                title: '',
                type: 'red',
                boxWidth: '400px',
                useBootstrap: false,
                content: "\n                                    <div class=\"text-6xl text-center text-red-500 my-4\">\n                                        <i class=\"fas fa-times-circle\"></i>\n                                    </div>\n                                    <div class=\"text-xl text-center font-bold\">\n                                        Crafting Failed!\n                                    </div>\n                                    <div class=\"text-lg text-center\">\n                                        You don't have enough materials to craft this achievement!\n                                    </div>"
              });
            } else {
              $.alert({
                title: '',
                type: 'green',
                boxWidth: '400px',
                useBootstrap: false,
                content: "\n                                    <div class=\"text-6xl text-center text-green-500 my-4\">\n                                        <i class=\"fas fa-check\"></i>\n                                    </div>\n                                    <div class=\"text-xl text-center font-bold\">\n                                        Crafting Succeed!\n                                    </div>\n                                    <div class=\"text-lg text-center\">\n                                        Thanks for crafting here mate :)\n                                    </div>"
              });
              $.ajax({
                url: "/achievement",
                method: "post"
              }).done(function (response) {
                $("#content").html(response);
              });
            }
          });
        }
      },
      no: {
        text: 'No',
        btnClass: 'btn-red'
      }
    }
  });
}

function searchMaterial() {
  var theKeyword = $("#keyword").val();
  $.ajax({
    url: '/achievement-crafting/search',
    method: 'post',
    data: {
      search: theKeyword
    }
  }).done(function (response) {
    $("#materials").html(response);
  });
}
/******/ })()
;