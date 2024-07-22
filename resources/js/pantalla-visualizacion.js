function fetchAlumnos() {
    fetch("{{ route('pantalla.visualizacion') }}")
        .then(response => response.text())
        .then(data => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');
            const newTableBody = doc.getElementById('alumnos-table-body');
            document.getElementById('alumnos-table-body').innerHTML = newTableBody.innerHTML;
        })
        .catch(error => console.error('Error fetching data:', error));
}

setInterval(fetchAlumnos, 5000); // Actualiza cada 5 segundos