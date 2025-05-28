<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kanban Board</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/dragula@3.7.2/dist/dragula.min.css" rel="stylesheet">
    <style>
        .kanban-column {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            min-height: 400px;
        }

        .kanban-card {
            background-color: white;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            margin-bottom: 10px;
            padding: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            cursor: grab;
        }

        .kanban-card:active {
            cursor: grabbing;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <h2 class="mb-4 text-center">Kanban Board</h2>
        <div class="row g-3">
            <div class="col-md-4">
                <div class="kanban-column" id="todo">
                    <h5 class="text-primary">To Do</h5>
                    <div class="kanban-card">Design homepage</div>
                    <div class="kanban-card">Create login form</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="kanban-column" id="in-progress">
                    <h5 class="text-warning">In Progress</h5>
                    <div class="kanban-card">API integration</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="kanban-column" id="done">
                    <h5 class="text-success">Done</h5>
                    <div class="kanban-card">Wireframe approval</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/dragula@3.7.2/dist/dragula.min.js"></script>
    <script>
        dragula([
            document.getElementById('todo'),
            document.getElementById('in-progress'),
            document.getElementById('done')
        ]);
    </script>
</body>

</html>