export default function argEmprUnidades(config) {
    return {
        ...config,
        
        cambiarMina(mina) {
            fetchWithLoading(routes.cambiarMina, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute('content')
                },
                body: JSON.stringify({ 
                    id : mina.id, 
                    nombre: mina.nombre 
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    this.minaSeleccionada = mina;
                }
                else {
                    Swal.fire({
                        title: 'Error',
                        text: 'Error al cambiar de mina, comuniquese con su administrador',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            })
        }
    }
}