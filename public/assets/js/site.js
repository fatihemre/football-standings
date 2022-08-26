var site = {
    data: null,
    params: 'test=deneme&item=1',

    /**
     * Herhangi bir kütüphane kullanmadan, XHR isteği gönderelim.
     */
    xhr: async function() {
        let req = new XMLHttpRequest();

        req.onreadystatechange = function() {

            if(this.readyState == 4 && this.status == 200) {
                site.data = JSON.parse(req.responseText);
            } else {
                site.data = {error: this.statusText};
            }
            site.result();
        };


        req.open('POST', '/manage/xhr-result', true);
        req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        await req.send(site.params);


    },

    /**
     * Jquery $.ajax kullanarak XHR isteği gönderelim.
     */
    xhrWithJquery: async function() {

        await $.ajax({
            url: '/manage/xhr-result',
            dataType: 'json',
            data: {test: 'deneme', item: 1},
            type: 'post'
        }).done(function(response){
            site.data = response;
            site.result();
        }).fail (function(jqXHR) {
            site.data = jqXHR.responseText;
        });
    },

    /**
     * fetch() API kullanarak XHR isteği gönderelim.
     */
    xhrWithFetch: function () {

        fetch('/manage/xhr-result', {
            method: 'post',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({test: 'deneme', item: 1})
        })
            .then((response) => response.json())
            .then((data) => {
                site.data = data;
                site.result()
            });
    },

    /**
     * Axios kullanarak XHR isteği gönderelim.
     */
    xhrWithAxios: function() {

        axios.post('/manage/xhr-result', {
            firstName: 'Fred',
            lastName: 'Flintstone'
        })
            .then(function (response) {
                console.log(response);
                site.data = response.data;
                site.result();
            })
            .catch(function (error) {
                console.log(error);
            });

    },

    result: function(){
        document.getElementById('results').innerHTML = JSON.stringify(site.data);
    }

};

document.addEventListener('DOMContentLoaded', function(){

    $('button[name=xhr]').on('click', function(){
        site.xhr();
    });

    $('button[name=xhrJquery]').on('click', function(){
        site.xhrWithJquery();
    });

    $('button[name=xhrFetch]').on('click', function(){
        site.xhrWithFetch();
    });

    $('button[name=xhrAxios]').on('click', function(){
        site.xhrWithAxios();
    })

});