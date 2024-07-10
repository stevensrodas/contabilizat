(function () {
    //Boton para mostrar modal de editar usuario

    const editar = document.querySelectorAll('.editar');

    // Añadir el evento a cada botón
    /* editar.forEach(button => {
        button.addEventListener('click', mostrarFormulario);
    }); */

    editar.forEach(button => {
        button.addEventListener('click', (event) => {
            // Obtener el ID del usuario desde el atributo data-id
            selectedUserId = event.currentTarget.dataset.id;
            console.log('ID del usuario seleccionado:', selectedUserId);
            if (selectedUserId) {
                mostrarModal(selectedUserId);
            }
        });

    });

    function mostrarModal(selectedUserId) {
        const modal = document.createElement('DIV');
        modal.classList.add('modal');
        modal.innerHTML = `
        <div class="eliminar">
            <legend>Eliminar usuario</legend>
            <p>¿Estas seguro que deseas eliminar este usuario?</p>
            <input type="hidden" class="id_user" name="user_id" value="${selectedUserId}">
            <div class="opciones">
                <input type="submit" class="eliminar_usuario" value="Eliminar" />
                <button type="button" class="cerrar-modal">Cancelar</button>
            </div>
        </div>
        `;

        setTimeout(() => {
            const modal_delete = document.querySelector('.eliminar');
            modal_delete.classList.add('animar');
        }, 0);

        modal.addEventListener('click', function (e) {
            e.preventDefault();

            if (e.target.classList.contains('cerrar-modal')) {
                const modal_delete = document.querySelector('.eliminar');
                modal_delete.classList.add('cerrar');
                setTimeout(() => {
                    modal.remove();
                }, 500);
            }
            if (e.target.classList.contains('eliminar_usuario')) {
                eliminarUsuarioBD(selectedUserId);

                setTimeout(() => {
                    modal.remove();
                }, 500);
            }
        });

        document.querySelector('.dashboard').appendChild(modal);

    }

    async function eliminarUsuarioBD(selectedUserId) {
        //obtener el valor del id seleccionado
        const userId = selectedUserId;

        const datos = new FormData();
        datos.append('id', userId);

        try{

            const url = `${location.origin}/api/usuario/eliminar`;
            const respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            });

            const resultado = await respuesta.json();

            if (resultado.resultado) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Eliminaste el usuario exitosamente",
                    showConfirmButton: false,
                    timer: 1500
                  });
                  const usuario = document.querySelector(`tr[data-id="${userId}"]`);

                  if (usuario) {
                    usuario.remove();
                }
                  
            }

        } catch (error) {

        }

        /* fetch('http://localhost/UpTask_MVC/controllers/DashboardController', {
            method: 'POST',
            headers: {
                'content-type': 'application/json'
            },
            body: JSON.stringify({ id: userId })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Usuario eliminado:', userId);
                    // Eliminar el elemento de la tabla en la interfaz de usuario
                    const usuarioRow = document.getElementById(`usuario-${userId}`);
                    if (usuarioRow) {
                        usuarioRow.remove();
                    }
                } else {
                    console.error('Error al eliminar el usuario:', data.message);
                }
            })
            .catch(error => {
                console.error('Error en la solicitud:', error);
            }); */
    }
})();
