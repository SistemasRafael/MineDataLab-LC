let pendingRequests = 0;

const showLoading = () => {
    const loader = document.getElementById('global-loading');
    
    if (!loader){
        return;
    } 

    loader.classList.remove('hidden');
};

const hideLoading = () => {
    const loader = document.getElementById('global-loading');

    if (!loader) {
        return;
    } 

    loader.classList.add('hidden');
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


