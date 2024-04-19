<div class="modal fade" id="profileConsultation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="UpdateUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="POST">
            <input type="hidden" id="idCurrentUser" name="idUser" value="<?= $currentUser->idUser ?>" />
            <input type="hidden" name="action" value="updateAccount" />
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newUserLabel">Modifier utilisateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4 d-flex justify-content-center align-items-center" style="height: 156px;">
                            <label for="inputImgCurrentUser" class="h-100 d-flex align-items-center justify-content-center my-3">
                                <img id="imgCurrentUser" src="<?= $currentUser->picture ?>" class="object-fit-contain mw-100 mh-100" style="cursor: pointer;" alt="Image de l'utilisateur">
                            </label>
                            <input id="inputImgCurrentUser" type="file" class="d-none" name="picture">
                        </div>

                        <div class="col-8 d-flex flex-column justify-content-between">
                            <div class="mb-3">
                                <label for="inputCurrentUserLastName">Nom</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
                                    <input id="inputCurrentUserLastName" type="text" class="form-control" name="lastName" value="<?= $currentUser->lastName ?>">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="inputCurrentUserFirstName">Prénom</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
                                    <input id="inputCurrentUserFirstName" type="text" class="form-control" name="firstName" value="<?= $currentUser->firstName ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <label for="inputTypePwd" class="form-label">Type de mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <select class="form-select selectTypePwd" id="CurrentUserinputTypePwd" name="typePwd">
                                    <option value="1" <?= $currentUser->typePwd === 1 ? 'selected' : "" ?>> Texte </option>
                                    <option value="2" <?= $currentUser->typePwd === 2 ? "selected" : "" ?>> Code </option>
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="textField">
                            <div class="col-12 mt-3">
                                <label for="inputPwd" class="form-label">Mot de passe</label>
                                <div class="input-group">
                                    <input id="CurrentUserinputPwd" type="password" class="form-control input-pwd" name="pwd">
                                    <span role="button" class="input-group-text"><i class="bi bi-eye"></i></span>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="inputConfirmPwd" class="form-label">Confirmation du mot de passe</label>
                                <div class="input-group">
                                    <input id="CurrentUserinputVerifPwd" type="password" class="form-control input-pwd" name="verifPwd">
                                    <span role="button" class="input-group-text"><i class="bi bi-eye"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="codeField">
                            <div class="col-12 mt-3">
                                <label for="inputPwd" class="form-label">Code</label>
                                <div class="input-group">
                                    <input id="CurrentUserinputCode" type="password" class="form-control input-pwd" name="pwd" pattern="[0-9]{4,6}">
                                    <span role="button" class="input-group-text"><i class="bi bi-eye"></i></span>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <label for="CurrentUserinputCode" class="form-label">Confirmation du code</label>
                                <div class="input-group">
                                    <input id="inputVerifPwd" type="password" class="form-control input-pwd" name="verifPwd" pattern="[0-9]{4,6}">
                                    <span role="button" class="input-group-text"><i class="bi bi-eye"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer text-center mt-3">
                            <button type="button" class="btn btn-cancel-account btn-danger me-2" data-bs-dismiss="modal">
                                <i class="bi bi-x-circle me-2"></i>Annuler
                            </button>
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-check-circle me-2"></i>Valider
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>