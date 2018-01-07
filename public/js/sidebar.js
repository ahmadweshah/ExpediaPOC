window.onload = function () {
    this.initDates();
    this.initSlider();
    this.initSearch();
};

initDates = function () {
    var dateToday = new Date();
    $('#startDate,#endDate').datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: dateToday
    });

    //fix for safari placeholder text bug
    $('#startDate,#endDate').click(function(){
        $(this).removeAttr('placeholder');
    });
};

initSlider = function () {
    var minTotalRate = $('#minTotalRate');
    var maxTotalRate = $('#maxTotalRate');

    $('#slider-range').slider({
        range: true,
        min: 0,
        max: 5000,
        values: [parseInt(minTotalRate.val()), parseInt(maxTotalRate.val())],
        slide: function (event, ui) {
            $('#totalRate').val('$' + ui.values[0] + ' - $' + ui.values[1]); //on slide amount change
            minTotalRate.val(ui.values[0]); //on slide amount change
            maxTotalRate.val(ui.values[1]); //on slide amount change
        }
    });

    //initial amount on page load
    $('#totalRate').val('$' + minTotalRate.val() + ' - $' + maxTotalRate.val());
};

initSearch = function () {
    $('#searchForm').submit(function () {
        var opts = {
            lines: 11, // The number of lines to draw
            length: 20, // The length of each line
            width: 10, // The line thickness
            radius: 25, // The radius of the inner circle
            scale: 0.5, // Scales overall size of the spinner
            corners: 1, // Corner roundness (0..1)
            color: '#000', // #rgb or #rrggbb or array of colors
            opacity: 0.25, // Opacity of the lines
            rotate: 0, // The rotation offset
            direction: 1, // 1: clockwise, -1: counterclockwise
            speed: 1.5, // Rounds per second
            trail: 60, // Afterglow percentage
            fps: 20, // Frames per second when using setTimeout() as a fallback for CSS
            zIndex: 2e9, // The z-index (defaults to 2000000000)
            className: 'spinner', // The CSS class to assign to the spinner
            top: '50%', // Top position relative to parent
            left: '50%', // Left position relative to parent
            shadow: false, // Whether to render a shadow
            hwaccel: false, // Whether to use hardware acceleration
            position: 'absolute' // Element positioning
        };

        var target = document.getElementById('searchForm');
        var spinner = new Spinner(opts).spin(target);

        $('#searchForm').css('opacity', 0.3);
        $('#mainContent').css('opacity', 0.3);
    });
};
