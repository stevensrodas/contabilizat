//Usuarios
const usuario = document.querySelector('.usuario');
const usuarios = document.querySelector('.usuarios');
const icono_usuario = document.querySelector('.icono_usuario');

//Almacenes
const instituto = document.querySelector('.instituto');
const institutos = document.querySelector('.institutos');
const icono_instituto = document.querySelector('.icono_instituto');

usuario.addEventListener('click', () => {
    if (usuarios.style.display === 'none' || usuarios.style.display === '') {
        usuarios.style.display = 'block';
        icono_usuario.style.transform = 'rotate(180deg)'; // Gira el icono_usuario 180 grados
    } else {
        usuarios.style.display = 'none';
        icono_usuario.style.transform = 'rotate(360deg)'; // Gira el icono_usuario 180 grados
    }
});
instituto.addEventListener('click', () => {
    if (institutos.style.display === 'none' || institutos.style.display === '') {
        institutos.style.display = 'block';
        icono_instituto.style.transform = 'rotate(180deg)'; // Gira el icono_instituto 180 grados
    } else {
        institutos.style.display = 'none';
        icono_instituto.style.transform = 'rotate(360deg)'; // Gira el icono_instituto 180 grados
    }
});