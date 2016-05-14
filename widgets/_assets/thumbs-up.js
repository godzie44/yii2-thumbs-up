(function($){
    $(document).on('change', '.thumbsControl', function() {
        var self=this;

        $(document).queue(function(){
            var diff = $(self).prop('checked')?1:-1;

            var countLabel = $(self).parent().find('.thumbsCount');
            countLabel.html(parseInt(countLabel.html()) + diff);

            $('.thumbsControl:checked').each(function(i, el){
                if (el !== self){
                    if (diff===1) {
                        //if user inc some thumb, we must desc others
                        var _countLabel = $(el).parent().find('.thumbsCount');
                        _countLabel.html(parseInt(_countLabel.html()) - diff);
                    }
                    $(el).prop('checked', false);
                }
            });

            $.post({
                url: '',
                data: $('#thumbsUpForm').serialize()
            });

            $(document).dequeue();
        });
    })
})(window.jQuery);