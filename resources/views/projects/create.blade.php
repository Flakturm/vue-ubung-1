<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ajax form</title>
    <link rel="stylesheet" href="/css/app.css">
    <style media="screen">
        body {
            padding: 50px;
        }
    </style>
</head>
<body>

    <div id="app" class="container">

        @if ( count($projects) )
            <h1 class="title is-3">My Projects</h1>
            <ul>
                @foreach ($projects as $project)
                    <li>
                        <a href="#">{{ $project->name }}</a>
                    </li>
                @endforeach
            </ul>
            <hr>
        @endif

        <form method="post" action="/projects" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
            <div class="field">
                <div class="control">
                    <label for="name" class="label">Project Name</label>
                    <input name="name" type="text" v-model="form.name">
                    <span class="help is-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <label for="description" class="label">Project Description</label>
                    <input name="description" type="text" v-model="form.description">
                    <span class="help is-danger" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></span>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button is-primary" :class="{ 'is-loading': form.isLoading }" :disabled="form.errors.any()">Create</button>
                </div>
            </div>
        </form>
    </div>

    <script src="/js/app.js"></script>
</body>
</html>
