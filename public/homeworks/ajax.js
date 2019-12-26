window.onload = function() {
    const url = 'test.php';
    let data = { operand1: '5', operation: 'sum', operand2: '8'};
    console.log("123");
    
    try {
        const response = fetch(url, {
            method: 'POST',
            body: JSON.stringify(data),
            headers: { 'Content-Type': 'application/json' }
        });
        const result = await response.json();
        console.log('Успех:', JSON.stringify(result));
    } catch (error) {
        console.error('Ошибка', error);
    }
 };