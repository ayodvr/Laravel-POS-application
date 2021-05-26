
it('should remove the template directive and css class', function() {
    expect($('#template1').getAttribute('ng-cloak')).
      toBeNull();
    expect($('#template2').getAttribute('ng-cloak')).
      toBeNull();
      expect($('#template3').getAttribute('ng-cloak')).
      toBeNull();
    expect($('#template4').getAttribute('ng-cloak')).
      toBeNull();
      expect($('#template5').getAttribute('ng-cloak')).
      toBeNull();
    expect($('#template6').getAttribute('ng-cloak')).
      toBeNull();
      expect($('#template7').getAttribute('ng-cloak')).
      toBeNull();
    expect($('#template8').getAttribute('ng-cloak')).
      toBeNull();
      expect($('#template9').getAttribute('ng-cloak')).
      toBeNull();
  });