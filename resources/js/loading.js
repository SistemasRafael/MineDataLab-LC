let pendingRequests = 0;

const showLoading = () => {
    Swal.fire({
        title: 'Cargando...',
        allowOutsideClick: false,
        allowEscapeKey: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
};

const hideLoading = () => {
    Swal.close();
};

window.fetchWithLoading = async (url, options = {}) => {
    pendingRequests++;
    showLoading();

    try 
    {
        return await fetch(url, options);
    } 
    finally 
    {
        pendingRequests--;
        if (pendingRequests === 0) {
            hideLoading();
        }
    }
};


