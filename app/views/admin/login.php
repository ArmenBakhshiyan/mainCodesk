

<div class = 'p-2'></div>
        <div class = 'border border-2 border-black mt-5 bg-danger w-100 text-white h1 text-center'>
              <?php
                  if(isset_session('error'))
                  echo get_session('error');  
              ?>
        </div>
    <section class=" mt-5" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-3 text-center">
                            <h3 class="mb-5">Sign in</h3>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="email" id="typeEmailX-2" class="form-control form-control-lg" name = 'email'/>
                                <label class="form-label" for="typeEmailX-2" id = 'emailValue'>Login</label>
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name = 'pas'/>
                                <label class="form-label" for="typePasswordX-2" >Password</label>
                            </div>

                  <!-- Checkbox -->
                            <div class="form-check1 d-flex justify-content-start mb-4">
                               
                                <input type = "checkbox" class="form-check-input1"  id="form1Example3" />
                                <label class="form-check-label ms-2" for="form1Example3"> Remember password </label>
                            </div>

                            <button type="button" class="btn btn-primary btn-lg btn-block" id = "loginClick" onclick = "login()">Login</button>

                            <hr class="my-4 text-danger" style="height: 4px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

