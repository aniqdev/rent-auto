@extends('admin.layouts.app')

@section('content')

    <div class="container">
        <div class="top-info-table row" style="padding: 20px;
        position: fixed;
        width: 69%;
        background: rgb(36 41 57);
        z-index: 1;
        color: white;">
            <div class="top-ifo-table-active col-sm-2">
                Active/Disactive
            </div>
            <div class="top-info-table-name col-sm-2">
                Name of object
            </div>
            <div class="top-info-table-input col-sm-6">
                Enter your value
            </div>
            {{-- <div class="col-sm-2"> </div> --}}
        </div>

        <div class="options pt-5" style="background:white; margin-top: 62px">
            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="checktest" name="checktest">
                    <label class="form-check-label" for="checktest">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

            <div class="option-raw form-inline" style="padding: 20px;">
                <div class="option-checkbox col-sm-2" style="display: flex; align-items: center;">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Default checkbox
                    </label>
                </div>
                <div class="option-name col-sm-2">
                    Sale for caravan
                </div>
                <div class="option-input col-sm-6">
                    <input type="text" class="form-control " id="inputPassword2" placeholder="texet" style="width: 100%;">
                </div>
                <div class="option-submit col-sm-2">
                    <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                </div>
            </div>

        </div>
    </div>
@endsection
