@extends('layouts.app')

@section('content')

<!-- Header Section -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f4f4f4"> 
    <div class="container-fluid">
        <!-- Logo atau teks di kiri -->
        <a class="navbar-brand text" href="#" style="color:rgb(8, 8, 8);">Find Mentor</a>
        
        <!-- Bagian ikon di kanan -->
        <div class="d-flex align-items-center ms-auto gap-3"> <!-- `ms-auto` untuk mendorong elemen ke kanan -->
            <a href="{{ route('history') }}">
                <img src="/images/document.png" alt="Document" width="35">
            </a>
            <a href="{{ route('cart') }}" class="{{ request()->routeIs('cart') ? 'active-link' : '' }}">
                <img src="/images/shoppingcart.png" alt="Cart" width="50" style="padding-right: 20px;">
            </a>
            <style>
                .active-link img {
                    display: inline-block;
                    border-bottom: 2px solid blue;
                    padding-bottom: 2px;
                    width: 50px;
                }
            </style>

        </div>
    </div>
</nav>

<div class="container my-4" style="background-color:rgb(254, 254, 254); min-height: 100vh; padding: 20px; border-radius: 30px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1)">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <!-- Main White Rectangle -->
    <div class="bg-white p-4 rounded-20">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold results-header">Let's choose your Mentor!</h5>
            <!-- Tombol Add Mentor -->
            <button class="btn" style="background-color: #BD9CFE; color: white; border-radius: 50px;" data-bs-toggle="modal" data-bs-target="#addMentorModal">
                Add Mentor
                <img src="/images/plus-icon.png" alt="Add" style="width: 20px; margin-left: 20px;">
            </button>
        </div>

        <!-- Modal Pop-Up -->
        <div class="modal fade" id="addMentorModal" tabindex="-1" aria-labelledby="addMentorModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <form id="addMentorForm" action="{{ route('mentors.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addMentorModalLabel">Add New Mentor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Mentor Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="skills" class="form-label">Mentor Skills</label>
                            <input type="text" class="form-control" id="skills" name="skills" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Mentor Price</label>
                            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="description" name="description" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" style="background-color: #BD9CFE;">Add New Mentor</button>
                    </div>
                </form>

                </div>
            </div>
        </div>

        <!-- Filters -->
        <!-- <div class="d-flex gap-4 my-3 flex-wrap">
            <input type="text" class="form-control w-auto" placeholder="Search Here..." />
            <button class="btn btn-outline-secondary">Price</button>
            <button class="btn btn-outline-secondary">Price ($$)</button>
            <button class="btn btn-outline-secondary">Subject</button>
            <button class="btn btn-outline-secondary">Filters</button>
        </div> -->

        <!-- Mentor Cards -->
        <div id="mentor-cards" class="row">
            @forelse ($mentors as $mentor)
                <div class="col-md-4 mb-4">
                    <div class="card rounded-4 p-3 mentor-card" data-id="{{ $mentor->id }}" style="box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                        <img src="{{ asset('images/' . $mentor->image) }}" class="card-img-top rounded-4" alt="{{ $mentor->skills }}">
                        <div class="card-body">
                            <h6 class="text-muted mentor-name">{{ $mentor->name }}</h6>
                            <p class="text-dark fw-bold mentor-skills">{{ $mentor->skills }}</p>
                            <p class="text-purple fw-bold mentor-price">${{ number_format($mentor->price, 2) }}</p>
                            <button class="btn btn-primary w-100" style="background-color: #BD9CFE; border-radius: 50px;">Add to Cart</button>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No mentors available.</p>
            @endforelse
        </div>
        
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mentorCards = document.querySelectorAll('.mentor-card');

        mentorCards.forEach(card => {
            card.addEventListener('click', function () {
                const mentorId = card.getAttribute('data-id');

                // Fetch mentor details
                fetch(`/mentors/${mentorId}`)
                    .then(response => {
                        if (!response.ok) throw new Error("Failed to fetch mentor details");
                        return response.json();
                    })
                    .then(data => {
                        // Populate modal fields
                        document.querySelector('#mentorId').value = data.id;
                        document.querySelector('#detailImage').src = `/images/${data.image}`;
                        document.querySelector('#detailName').value = data.name;
                        document.querySelector('#detailSkills').value = data.skills;
                        document.querySelector('#detailPrice').value = data.price;
                        document.querySelector('#detailDescription').value = data.description;

                        // Show the modal
                        const modal = new bootstrap.Modal(document.querySelector('#detailModal'));
                        modal.show();
                    })
                    .catch(error => console.error(error));
            });
            });
        });

        // Handle save (update) functionality
        document.querySelector('#saveChanges').addEventListener('click', function () {
            const mentorId = document.querySelector('#mentorId').value;

            const formData = new FormData();
            formData.append('name', document.querySelector('#detailName').value);
            formData.append('skills', document.querySelector('#detailSkills').value);
            formData.append('price', document.querySelector('#detailPrice').value);
            formData.append('description', document.querySelector('#detailDescription').value);

            const image = document.querySelector('#detailImageFile').files[0];
            if (image) {
                formData.append('image', image);
            }

            fetch(/mentors/${mentorId}, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Mentor updated successfully!');
                        location.reload();
                    } else {
                        alert('Failed to update mentor.');
                    }
                });
        });

        // Handle delete functionality
        document.querySelector('#deleteMentor').addEventListener('click', function () {
            const mentorId = document.querySelector('#mentorId').value;

            fetch(/mentors/${mentorId}, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Mentor deleted successfully!');
                        location.reload();
                    } else {
                        alert('Failed to delete mentor.');
                    }
                });
        });
    });
</script>

<!-- Detail Modal -->
<!-- <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="mentorId">
                <div class="mb-3">
                    <label for="detailImageFile" class="form-label">Upload Image</label>
                    <input type="file" class="form-control" id="detailImageFile">
                    <img id="detailImage" src="" alt="Preview Image" class="mt-3 img-fluid rounded">
                </div>
                <div class="mb-3">
                    <label for="detailName" class="form-label">Mentor Name</label>
                    <input type="text" class="form-control" id="detailName" required>
                </div>
                <div class="mb-3">
                    <label for="detailSkills" class="form-label">Mentor Skills</label>
                    <input type="text" class="form-control" id="detailSkills" required>
                </div>
                <div class="mb-3">
                    <label for="detailPrice" class="form-label">Mentor Price</label>
                    <input type="number" class="form-control" id="detailPrice" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="detailDescription" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="detailDescription" rows="3" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="saveChanges">Edit Detail</button>
                <button type="button" class="btn btn-danger" id="deleteMentor">Hapus Mentor</button>
            </div>
        </div>
    </div>
</div> -->


        <!-- See More Button -->
        <!-- <div class="text-center my-4">
            <button class="btn btn-primary px-4 py-2 see-more-btn" style="background-color: #9D6BFF; border-radius: 50px; font-size: 18px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1)">See More..</button>
        </div> -->
    </div>

</div>

<style>
    .results-header {
        font-size: 30px;
    }

    .mentor-name {
        font-size: 18px;
        font-weight: bold;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .mentor-skills {
        font-size: 20px;
        color: #6c757d;
        margin-top: 5px;
    }

    .mentor-price {
        font-size: 20px;
        font-weight: bold;
        color: #BD9CFE;
        margin-top: 10px;
    }

    .mentor-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
    }

    .mentor-card {
        padding: 15px;
        border: 1px solid #eaeaea;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    .see-more-btn {
        background-color: #9D6BFF;
        border-radius: 50px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mentorCards = document.querySelectorAll('.mentor-card');

        mentorCards.forEach(card => {
            card.addEventListener('click', function () {
                const mentorId = card.getAttribute('data-id');

                // Fetch mentor details
                fetch(`/mentors/${mentorId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Populate modal fields
                        document.querySelector('#mentorId').value = data.id;
                        document.querySelector('#detailImage').src = `/images/${data.image}`;
                        document.querySelector('#detailName').value = data.name;
                        document.querySelector('#detailSkills').value = data.skills;
                        document.querySelector('#detailPrice').value = data.price;
                        document.querySelector('#detailDescription').value = data.description;

                        // Show the modal
                        const modal = new bootstrap.Modal(document.querySelector('#detailModal'));
                        modal.show();
                    });
            });
        });

        // Handle save (update) functionality
        document.querySelector('#saveChanges').addEventListener('click', function () {
            const mentorId = document.querySelector('#mentorId').value;

            const formData = new FormData();
            formData.append('name', document.querySelector('#detailName').value);
            formData.append('skills', document.querySelector('#detailSkills').value);
            formData.append('price', document.querySelector('#detailPrice').value);
            formData.append('description', document.querySelector('#detailDescription').value);

            const image = document.querySelector('#detailImageFile').files[0];
            if (image) {
                formData.append('image', image);
            }

            fetch(`/mentors/${mentorId}`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Mentor updated successfully!');
                        location.reload();
                    } else {
                        alert('Failed to update mentor.');
                    }
                });
        });

        // Handle delete functionality
        document.querySelector('#deleteMentor').addEventListener('click', function () {
            const mentorId = document.querySelector('#mentorId').value;

            fetch(`/mentors/${mentorId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Mentor deleted successfully!');
                        location.reload();
                    } else {
                        alert('Failed to delete mentor.');
                    }
                });
        });
    });
</script>

<!-- Detail Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="mentorId">
                <div class="mb-3">
                    <label for="detailImageFile" class="form-label">Upload Image</label>
                    <input type="file" class="form-control" id="detailImageFile">
                    <img id="detailImage" src="" alt="Preview Image" class="mt-3 img-fluid rounded">
                </div>
                <div class="mb-3">
                    <label for="detailName" class="form-label">Mentor Name</label>
                    <input type="text" class="form-control" id="detailName" required>
                </div>
                <div class="mb-3">
                    <label for="detailSkills" class="form-label">Mentor Skills</label>
                    <input type="text" class="form-control" id="detailSkills" required>
                </div>
                <div class="mb-3">
                    <label for="detailPrice" class="form-label">Mentor Price</label>
                    <input type="number" class="form-control" id="detailPrice" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="detailDescription" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="detailDescription" rows="3" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn" id="saveChanges" style="background-color: #BD9CFE; color: white;">
                Edit Detail
            </button>
                <button type="button" class="btn btn-danger" id="deleteMentor">Hapus Mentor</button>
                
            </div>
        </div>
    </div>
</div>


@endsection