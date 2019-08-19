export var name = 'aasd';

export function addAlert(response) {
    swal.fire({
        imageUrl: 'data:image/png;base64,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',
        imageHeight: 150,
        imageAlt: 'A tall image',
        title: response.data,
        timer: 1000
    });
}

export function errorAlert(response) {
    Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: response.error,
    })
}

export function updateAlert(response) {
    Swal.fire({
        title: response.data ,
        timer: 1000
    });
}