"use strict"

const URL = "api/gardens/";

let tasks = [];

let form = document.querySelector('#product-form');
form.addEventListener('submit', insertgarden);


/**
 * Obtiene todas las tareas de la API REST
 */
async function getAllgardens() {
    try {
        let response = await fetch(URL);
        if (!response.ok) {
            throw new Error('Recurso no existe');
        }
        tasks = await response.json();

        showgardens();
    } catch(e) {
        console.log(e);
    }
}

/**
 * Inserta la tarea via API REST
 */
async function insertgarden(e) {
    e.preventDefault();
    
    let data = new FormData(form);
    let task = {
        titulo: data.get('titulo'),
        descripcion: data.get('descripcion'),
        prioridad: data.get('prioridad'),
    };

    try {
        let response = await fetch(URL, {
            method: "POST",
            headers: { 'Content-Type': 'application/json'},
            body: JSON.stringify(products)
        });
        if (!response.ok) {
            throw new Error('Error del servidor');
        }

        let ngarden = await response.json();

        // inserto la tarea nuevo
        products.push(ngarden);
        showTasks();

        form.reset();
    } catch(e) {
        console.log(e);
    }
} 

async function deletegarden(e) {
    e.preventDefault();
    try {
        let id = e.target.dataset.task;
        let response = await fetch(URL + id, {method: 'DELETE'});
        if (!response.ok) {
            throw new Error('Recurso no existe');
        }

        // eliminar la tarea del arreglo global
        products = products.filter(product => product.id != id);
        showgardens();
    } catch(e) {
        console.log(e);
    }
}

function showgardens() {
    let ul = document.querySelector("#product-list");
    ul.innerHTML = "";
    for (const product of products) {

        let html = `
            <li class='
                    list-group-item d-flex justify-content-between align-items-center
                '>
                <span> <b>${product.name}</b> - ${product.price} ${product.stock} ${product.size} ${product.type}</span>
                <div class="ml-auto">
                    <a href='#' data-product="${product.id}" type='button' class='btn btn-danger btn-delete'>Borrar</a>
                </div>
            </li>
        `;

        ul.innerHTML += html;
    }

    // asigno event listener para los botones
    const btnsDelete = document.querySelectorAll('a.btn-delete');
    for (const btnDelete of btnsDelete) {
        btnDelete.addEventListener('click', deletegarden);
    }
}

getAllgardens();