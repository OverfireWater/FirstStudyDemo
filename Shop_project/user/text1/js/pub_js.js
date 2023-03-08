  $(function() {
      $('#layer_btn').click(function() {
          $('.masking').fadeIn();
      })
      $('.close').click(function(event) {
          event.preventDefault;
          $('.masking').hide();
      });

      $('.masking').click(function(event) {
          event.preventDefault;
          $(this).hide();
      });
  })