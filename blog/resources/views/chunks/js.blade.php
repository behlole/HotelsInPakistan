  <script type="text/javascript">

  
  $('.itemName').select2({

    placeholder: 'Select City Name',

    ajax: {

      url: '/select2-autocomplete-ajax',

      dataType: 'json',

      delay: 250,

      processResults: function (data) {

        return {

          results:  $.map(data, function (item) {

            return {

              text: item.city_name,

              id: item.id

            }

          })

        };

      },

      cache: true

    }

  });


$('.abc').select2({

    placeholder: 'Pickup Point',

    ajax: {

      url: '/select2-autocomplete-ajax',

      dataType: 'json',

      delay: 250,

      processResults: function (data) {

        return {

          results:  $.map(data, function (item) {

            return {

              text: item.city_name,

              id: item.id

            }

          })

        };

      },

      cache: true

    }

  });

$('.restaurant_city').select2({

    placeholder: 'Search Restaurant in City',
    ajax: {

      url: '/select2-autocomplete-ajax',

      dataType: 'json',

      delay: 250,

      processResults: function (data) {

        return {

          results:  $.map(data, function (item) {

            return {

              text: item.city_name,

              id: item.id

            }

          })

        };

      },

      cache: true

    }

  });

  




</script>

