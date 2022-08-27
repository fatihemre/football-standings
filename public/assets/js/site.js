var site = {

    xhr: function (postTo, data, callback) {

        fetch(postTo, {
            method: 'post',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
            .then((response) => response.json())
            .then((data) => callback(data));
    }

};
