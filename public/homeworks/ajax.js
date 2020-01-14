function calculate(url, data){
    return fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
        .then(result => result.json())
        .catch(error => console.log(error));
}