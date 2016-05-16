(function ($) {
    $(document).ready(function () {
        $("[data-toggle='tooltip']").tooltip();
       
        refreshTooltipTitle();
    });

    $(document).on('change', '.thumbsControl', function () {
        var self = this;

        $(document).queue(function () {
            var diff = $(self).prop('checked') ? 1 : -1;

            var countLabel = $(self).parent().find('.thumbsCount');
            countLabel.html(parseInt(countLabel.html()) + diff);

            $('.thumbsControl:checked').each(function (i, el) {
                if (el !== self) {
                    if (diff === 1) {
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

            refreshTooltipTitle();
            showToolTip(self);
            $(document).dequeue();
        });
    });

    function refreshTooltipTitle() {
        $('.thumbsControl').each(function (i, el) {
            var $el = $(el);
            var $thumb = $el.parent().find('.thumb');

            if ($el.prop('checked')) {
                $thumb.attr('data-original-title', $el.parent().find('.active-label').html());
            } else {
                $thumb.attr('data-original-title', $el.parent().find('.un-active-label').html());
            }

        });
    }

    function showToolTip(activeControl) {
        $(activeControl).parent().find('.thumb')
            .tooltip('fixTitle')
            .tooltip('show');
    }


})(window.jQuery);
