<div class="modal fade" id="calculatrice" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Calculer un montant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div id="calc" class="text-center">
                        <div id="display">
                            <div id="result">
                                <p>0</p>
                            </div>
                            <div id="previous">
                                <p>0</p>
                            </div>
                        </div>
                        <div id="keyboard">
                            <div class="row">
                                <button class="btn btn-info btn-p" value="7">7</button>
                                <button class="btn btn-info btn-p" value="8">8</button>
                                <button class="btn btn-info btn-p" value="9">9</button>
                                <button class="btn btn-danger btn-p" value="ac">AC</button>
                                <button class="btn btn-danger btn-p" value="ce">CE</button>
                            </div>
                            <div class="row">
                                <button class="btn btn-info btn-p" value="4">4</button>
                                <button class="btn btn-info btn-p" value="5">5</button>
                                <button class="btn btn-info btn-p" value="6">6</button>
                                <button class="btn btn-warning btn-p" value="/">/</button>
                                <button class="btn btn-warning btn-p" value="*" style="height: 38px;">*</button>
                            </div>
                            <div class="row">
                                <button class="btn btn-info btn-p" value="1" style="width: 62px !important;height: 38px !important;">1</button>
                                <button class="btn btn-info btn-p" value="2" style="width: 62px !important;height: 38px !important;">2</button>
                                <button class="btn btn-info btn-p" value="3" style="width: 62px !important;height: 38px !important;">3</button>
                                <button class="btn btn-warning btn-p" value="+" style="width: 62px !important;height: 38px !important;">+</button>
                                <button class="btn btn-success btn-result btn-p" value="=" style="width: 62px !important;height: 38px !important;">=</button>

                            </div>
                            <div class="row last-row">
                                <button class="btn btn-info btn-p btn-zero" value="0" style="margin-top: 43px;">0</button>
                                <!-- <button class="invisible" value=""></button> -->
                                <button class="btn btn-warning btn-p" value="." style="width: 62px !important;height: 38px !important;margin-top: 43px;">.</button>
                                <button class="btn btn-warning btn-p" value="-" style="width: 62px !important;height: 38px !important;margin-top: 43px;">-</button>
                                <!-- <button class="invisible" value=""></button> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>

        </div>
    </div>
</div>