(function(win,doc,$,pub){
    pub.isTouchDevice;
    pub.utilities;

    function init() {
        setIsTouchDevice();
        win.app = pub;
        $.ajaxSetup({
            cache: false,
            //Sätt laravels CSRF token i HTTP-headern. Möjliggör t.ex. POST requests från jQuery till Laravel-appen
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    };

    function setIsTouchDevice() {
        pub.isTouchDevice = $('html').hasClass('mod-touch');
    }

    pub.addComponent = function(name, constructor, parent){
        var nameWithPrefix = 'aprj-' + name.substring(0,1).toUpperCase() + name.substring(1);
        $.fn[nameWithPrefix] = constructor;


        function appendComponent(){
            var $target = $(this);
            $target.attr('data-' + name, 'bound');

            $target[nameWithPrefix]($target.data);
        }

        if(parent === undefined) {
            $('.' + name).not('ignoreComponent').each(appendComponent);
        }
        else {
            $(parent).find('.' + name).not('ignoreComponent').each(appendComponent);
        }

    };

    init();

})(this, this.document, jQuery, {});