 <div class="modal fade" id="exampleModal{{$libro->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detalles de la obra</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{-- Detalles del libro --}}
                                    <div class="card " style="max-width: 540px;">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="{{$libro->portada}}" class="img-fluid rounded-start" alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$libro->titulo}}</h5>
                                                    <p class="card-text">{{$libro->descripcion}}</p>
                                                    <p class="card-text"><small class="text-muted">{{$libro->categoria->nombre}}</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="{{$libro->archivo_libro}}" {{$libro->archivo_libro}} type="button" class="btn btn-primary">Leer obra</a>
                                </div>
                            </div>
                        </div>
                    </div>
