<?php

class ResourceController
{
    private ResourceRepository $repository;

    public function __construct()
    {
        $this->repository = new ResourceRepository();
    }

    // Get /resourcers
    public function index(): void
    {
        $resources = $this->repository->findAll();

        View::render('resources/index', [
            'resources' => $resources,
            'flash' => FlashMessage::get(),
        ]);
    }

    //GET /resources/create
    public function create(): void
    {
        View::render('resources/create', [
            'flash' => FlashMessage::get(),
        ]);
    }

    //POST resources/store
    public function store(): void
    {
        $validator = new Validator();
        $validator->validate($_POST);

        if (!$validator->isValid()) {
            FlashMessage::set('error', implode(' ', $validator->getErrors()));
            header('Location: /resources/create');
            exit;
        }

        $this->repository->insert($_POST);
        FlashMessage::set('success', 'Ressource ajoutée avec succès.');
        header('Location: /resources');
        exit;
    }

    //GET resource/edit?id=3
    public function edit(): void
    {
        $id = (int) ($_GET['id'] ?? 0);
        $resource = $this->repository->findById($id);
        
        if(!$resource) {
            FlashMessage::set('error', 'Ressource introuvable.');
            header('Location: /resources');
            exit;
        }

        View::render('resources/edit',[
            'resource' => $resource,
            'flash' => FlashMessage::get(),
        ]);
    }

    // POST /resources/update?id=3
    public function update(): void
    {
        $id = (int) ($_GET['id']?? 0);
        $resource = $this->repository->findById($id);

        if(!$resource) {
            FlashMessage::set('error', 'Ressource Introuvable.');
            header('Location: /resources');
            exit;
        }

        $validator = new Validator();
        $validator->validate($_POST);

        if (!$validator->isValid()) {
            FlashMessage::set('error', implode(' ', $validator->getErrors()));
            header('Location: /resources/edit?id=' . $id);
            exit;
        }

        $this->repository->update($id, $_POST);
        FlashMessage::set('success', 'Ressource modifiée avec succès.');
        header('Location: /resources');
        exit;
    }

    //POST /resources/delete
    public function delete(): void
    {
        $id =(int) ($_POST['id']?? 0);
        $this->repository->delete($id);
        FlashMessage::set('success', 'Ressource supprimée.');
        header('Location: /resources');
        exit;
    }

    // Get /resources/show?id=3
    public function show(): void
    {
        $id = (int) ($_GET['id'] ?? 0);
        $resource = $this->repository->findById($id);

        if(!$resource) {
            FlashMessage::set('error', 'Ressource introuvable.');
            header('Location: /resources');
            exit;
        }

        View::render('resources/show',[
            'resource' => $resource,
            'flash' => FlashMessage::get(),
        ]);
    }

    
}
