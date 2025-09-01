<?php

class Bird {

  var $commonName;
  var $food = 'bugs';
  var $nestPlacement = 'tree';
  var $conservationLevel;

  function song() {
    return 'drink-your-tea!';
  }

  function canFly() {
    return 'This bird can fly';
  }
}
