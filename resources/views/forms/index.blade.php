@extends('files.layouts')

@section('title', 'Dashboard')

@section('main')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Starter Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">Featured</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="sticky-top mb-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Fields</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="field-group">
                                                <div class="row">
                                                    <div class="col-6 field-event btn shadow-sm" data-type="textbox">Text
                                                        Field</div>
                                                    <div class="col-6 field-event btn shadow-sm" data-type="number">Number
                                                        Field</div>
                                                    <div class="col-6 field-event btn shadow-sm" data-type="date">Date Field
                                                    </div>
                                                    <div class="col-6 field-event btn shadow-sm" data-type="email">Email
                                                        Field</div>
                                                    <div class="col-6 field-event btn shadow-sm" data-type="checkbox">
                                                        Checkboxes</div>
                                                    <div class="col-6 field-event btn shadow-sm" data-type="radios">Radios
                                                    </div>
                                                    <div class="col-6 field-event btn shadow-sm" data-type="list">Select
                                                        List</div>
                                                    <div class="col-6 field-event btn shadow-sm" data-type="textarea">Text
                                                        Area</div>
                                                    <div class="col-6 field-event btn shadow-sm" data-type="file">File
                                                        Upload</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header">
                                        <form>
                                            <div class="row">
                                                <div class="col-2">
                                                    <label for="formname">Form Name<span
                                                            class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-10">
                                                    <input type="text" name="formname" id="formname"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-body h-100" id="form-builder">
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-12">
                                                <button class="btn btn-sm btn-success">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings Modal -->
        <div class="modal fade" id="settingsModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="settingsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="settingsModalLabel">Field Settings</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="fieldLabel">Field Label</label>
                            <input type="text" id="fieldLabel" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="fieldPlaceholder">Placeholder</label>
                            <input type="text" id="fieldPlaceholder" class="form-control">
                        </div>
                        <div id="dynamic-options" class="d-none">
                            <label for="options">Options</label>
                            <div class="options-container"></div>
                            <button type="button" class="btn btn-secondary" id="addOption">+</button>
                            <button type="button" class="btn btn-danger" id="removeOption">-</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="removeField"><i
                                class="fa-solid fa-trash"></i></button>
                        <button type="button" class="btn btn-success" id="saveSettings"><i
                                class="fa-solid fa-floppy-disk"></i> Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>
        $(document).ready(function() {
            var currentField = null;

            $('.field-event').draggable({
                helper: 'clone',
                revert: 'invalid'
            });

            $('#form-builder').droppable({
                accept: '.field-event',
                drop: function(event, ui) {
                    var fieldType = ui.helper.data('type');
                    var newField;

                    switch (fieldType) {
                        case 'textbox':
                            newField = createField('Text Box', 'textbox',
                                '<input type="text" class="form-control">');
                            break;
                        case 'number':
                            newField = createField('Number Field', 'number',
                                '<input type="number" class="form-control">');
                            break;
                        case 'date':
                            newField = createField('Date Field', 'date',
                                '<input type="date" class="form-control">');
                            break;
                        case 'email':
                            newField = createField('Email Field', 'email',
                                '<input type="email" class="form-control">');
                            break;
                        case 'checkbox':
                            newField = createField('Checkbox', 'checkbox',
                                '<label><input type="checkbox"> Check Box</label>');
                            break;
                        case 'radios':
                            newField = createField('Radio Button', 'radios',
                                '<div><label><input type="radio" name="radio"> Option 1</label></div><div><label><input type="radio" name="radio"> Option 2</label></div>'
                            );
                            break;
                        case 'list':
                            newField = createField('Select List', 'list',
                                '<select class="form-control"><option>Option 1</option><option>Option 2</option></select>'
                            );
                            break;
                        case 'textarea':
                            newField = createField('Textarea', 'textarea',
                                '<textarea class="form-control"></textarea>');
                            break;
                        case 'file':
                            newField = createField('File Upload', 'file',
                                '<input type="file" class="form-control">');
                            break;
                    }

                    $('#form-builder').append(newField);
                    attachFieldEvents();
                }
            });

            function createField(labelText, fieldType, inputHTML) {
                return $(
                    '<div class="form-group field-container">' +
                    '<label>' + labelText + '</label>' +
                    inputHTML +
                    '</div>'
                );
            }

            function attachFieldEvents() {
                $('.field-container').off('click').on('click', function() {
                    currentField = $(this);
                    var label = currentField.find('label').first().text();
                    var placeholder = currentField.find('input, select, textarea').attr('placeholder') ||
                        '';

                    $('#fieldLabel').val(label);
                    $('#fieldPlaceholder').val(placeholder);

                    if (currentField.find('input[type="checkbox"]').length || currentField.find(
                            'input[type="radio"]').length || currentField.find('select').length) {
                        $('#dynamic-options').removeClass('d-none');
                        loadOptions();
                    } else {
                        $('#dynamic-options').addClass('d-none');
                    }

                    $('#settingsModal').modal('show');
                });
            }

            function loadOptions() {
                $('.options-container').empty();

                if (currentField.find('input[type="checkbox"]').length) {
                    currentField.find('input[type="checkbox"]').each(function() {
                        const labelText = $(this).parent().text().trim();
                        $('.options-container').append(
                            '<input type="text" class="form-control mb-1" value="' + labelText + '">');
                    });
                } else if (currentField.find('input[type="radio"]').length) {
                    currentField.find('input[type="radio"]').each(function() {
                        const labelText = $(this).parent().text().trim();
                        $('.options-container').append(
                            '<input type="text" class="form-control mb-1" value="' + labelText + '">');
                    });
                } else if (currentField.find('select').length) {
                    currentField.find('select option').each(function() {
                        $('.options-container').append(
                            '<input type="text" class="form-control mb-1" value="' + $(this).text() +
                            '">');
                    });
                }
            }

            $('#saveSettings').click(function() {
                var newLabel = $('#fieldLabel').val();
                var newPlaceholder = $('#fieldPlaceholder').val();

                if (currentField) {
                    currentField.find('label').first().text(newLabel);
                    currentField.find('input, select, textarea').attr('placeholder', newPlaceholder);

                    if (currentField.find('input[type="checkbox"]').length) {
                        currentField.find('input[type="checkbox"]').parent().remove();
                        $('.options-container input[type="text"]').each(function() {
                            const value = $(this).val();
                            currentField.append('<label><input type="checkbox"> ' + value +
                                '</label>');
                        });
                    } else if (currentField.find('input[type="radio"]').length) {
                        currentField.find('input[type="radio"]').parent().remove();
                        $('.options-container input[type="text"]').each(function() {
                            const value = $(this).val();
                            currentField.append('<div><label><input type="radio" name="radio"> ' +
                                value + '</label></div>');
                        });
                    } else if (currentField.find('select').length) {
                        currentField.find('select').remove();
                        let selectHTML = '<select class="form-control">';
                        $('.options-container input[type="text"]').each(function() {
                            const value = $(this).val();
                            selectHTML += '<option>' + value + '</option>';
                        });
                        selectHTML += '</select>';
                        currentField.append(selectHTML);
                    }

                    $('#settingsModal').modal('hide');
                }
            });

            $('#addOption').click(function() {
                $('.options-container').append(
                    '<input type="text" class="form-control mb-1" placeholder="New option">');
            });

            $('#removeOption').click(function() {
                const lastOption = $('.options-container input[type="text"]').last();
                if (lastOption.length) {
                    lastOption.remove();
                }
            });

            $('#removeField').click(function() {
                if (currentField) {
                    Swal.fire({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this field!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            currentField.remove();
                            $('#settingsModal').modal('hide');
                            currentField = null;
                        }
                    });
                }
            });
        });
    </script>
@endsection
