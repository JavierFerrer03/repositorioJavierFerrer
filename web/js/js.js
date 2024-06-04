/* code to change the images of the accordeon */
var buttonAccordion = document.querySelectorAll('#buttonAccordion');
buttonAccordion.forEach(button => {
    button.addEventListener('click', () => {
        const valueButton = button.getAttribute('data-id');
        var imageAccordion = document.getElementById('imgAccordion');
        switch (valueButton) {
            case 'entrenamiento':
                imageAccordion.src = 'web/images/entrenamiento.webp';
                break;
            case 'alimentacion':
                imageAccordion.src = 'web/images/alimentacion.webp';
                break;
            case 'recetas':
                imageAccordion.src = 'web/images/recetas.jpg';
                break;
            default:
                break;
        }
    })
});

/* code to calculate  */
document.addEventListener('DOMContentLoaded', (event) => {
    const ctx = document.getElementById('nutrition-chart').getContext('2d');
    let chart;

    // Variables para almacenar los totales acumulados
    let totalCalories = 0;
    let totalProteins = 0;
    let totalCarbs = 0;

    const updateChart = () => {
        const total = totalCalories + totalProteins + totalCarbs;
        const percentages = {
            calories: (totalCalories / total) * 100,
            proteins: (totalProteins / total) * 100,
            carbs: (totalCarbs / total) * 100
        };

        if (chart) {
            chart.data.datasets[0].data = [percentages.calories, percentages.proteins, percentages.carbs];
            chart.update();
        } else {
            chart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Calorías', 'Proteínas', 'Carbohidratos'],
                    datasets: [{
                        data: [percentages.calories, percentages.proteins, percentages.carbs],
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                        hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
                    }]
                }
            });
        }
    };

    const loadAccumulatedData = () => {
        fetch('index.php?accion=getAccumulatedData', {
            method: 'GET'
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    totalCalories = data.data.totalCalories || 0;
                    totalProteins = data.data.totalProteins || 0;
                    totalCarbs = data.data.totalCarbs || 0;

                    // Actualizar el gráfico
                    updateChart();
                } else {
                    console.error('Error al cargar los datos acumulados:', data.message);
                }
            })
            .catch(error => {
                console.error('Error en la solicitud:', error);
            });
    };

    document.getElementById('meal-log-form').addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch('index.php?accion=logMeal', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Comida añadida con éxito');
                    // Actualizar los datos acumulados
                    totalCalories += data.nutrition.calories;
                    totalProteins += data.nutrition.proteins;
                    totalCarbs += data.nutrition.carbs;

                    // Actualizar el gráfico
                    updateChart();
                } else {
                    alert('Error al añadir la comida');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error en la solicitud');
            });
    });

    // Cargar datos acumulados al cargar la página
    loadAccumulatedData();
});

/* Code of the canvas nutrients */
document.addEventListener('DOMContentLoaded', (event) => {
    const ctx = document.getElementById('mealChart').getContext('2d');
    const mealChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Desayuno', 'Snack Mañana', 'Almuerzo', 'Snack Tarde', 'Cena', 'Snack Nocturno'],
            datasets: [
                {
                    label: 'Calorías',
                    data: [350, 150, 450, 200, 500, 200],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Proteínas (g)',
                    data: [10, 10, 30, 5, 35, 20],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Carbohidratos (g)',
                    data: [50, 15, 40, 20, 50, 10],
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Grasas (g)',
                    data: [10, 5, 15, 10, 20, 8],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});