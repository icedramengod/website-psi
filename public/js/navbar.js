/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/navbar.js ***!
  \********************************/
$(function () {
  var theNavbar = $("#the-navbar");
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $("#hamburger-btn").on("click", function () {
    theNavbar.toggleClass("-translate-x-52");
  });
  $(".navbar-btn").on("click", function () {
    theNavbar.toggleClass("-translate-x-52");
  });
  $("#shop-btn").on("click", function () {
    $.ajax({
      url: "/shop",
      method: "get"
    }).done(function (response) {
      $("#content").html(response);
    });
  });
  $("#inven-btn").on("click", function () {
    $.ajax({
      url: "/inventory",
      method: "get"
    }).done(function (response) {
      $("#content").html(response);
    });
  });
  $("#achievement-btn").on("click", function () {
    $.ajax({
      url: "/achievement",
      method: "get"
    }).done(function (response) {
      $("#content").html(response);
    });
  });
  $("#history-btn").on("click", function () {
    $.ajax({
      url: "/history",
      method: "get"
    }).done(function (response) {
      $("#content").html(response);
    });
  });
});
/******/ })()
;