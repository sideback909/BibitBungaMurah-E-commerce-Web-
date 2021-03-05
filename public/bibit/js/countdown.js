// Countdown plugin
(function($){

  
  //
  // Constructor
  //
  function Countdown( element, date ) {
    this.$element = $(element);
    this.date     = date;
    
    this.init();
  };
  
  
  //
  // Initialize interval countdown
  //
  Countdown.prototype.init = function(){
    var _this = this;
    
    setInterval(function(){
      diff = _this.time_difference();
      
      $('.days .count').text(diff.days);
      $('.hours .count').text(diff.hours);
      $('.minutes .count').text(diff.minutes);
      $('.seconds .count').text(diff.seconds);
    }, 1000);
    
  };
  
  
  //
  // Time difference between given date & current date
  // @return [object]
  //
  Countdown.prototype.time_difference = function(){
    var days, hours, interval, minutes, seconds,
 
        ms_per_minute = 1000 * 60,
        ms_per_hour   = ms_per_minute * 60,
        ms_per_day    = ms_per_hour * 24,
        
        current_date  = new Date();
  
    if ( current_date > this.date ) {
      interval = current_date - this.date.getTime();
    } else {
      interval = this.date.getTime() - current_date;
    }
   
    days     = Math.floor(interval / ms_per_day);
    interval = interval - (days * ms_per_day);

    hours = Math.floor(interval / ms_per_hour);
    interval = interval - (hours * ms_per_hour);

    minutes = Math.floor(interval / ms_per_minute);
    interval = interval - (minutes * ms_per_minute);

    seconds = Math.floor(interval / 1000);

    return { 
      days: days, 
      hours: hours, 
      minutes: minutes, 
      seconds: seconds
    };
  };
  
  
  //
  // jQuery plugin
  //
  $.fn.countdown = function(date_a, date_b){
    this.each(function(){
      var $this = $(this);

      if ( !$this.data('js-countdown') ) {
        $this.data('js-countdown', new Countdown(this, date_a, date_b) );
      }
      
    });
  };
  
}(jQuery));


// Initialize plugin
$('.js-countdown').countdown( 
  new Date(Date.UTC(2019, 8, 9, 8, 20, 0)) 
);
