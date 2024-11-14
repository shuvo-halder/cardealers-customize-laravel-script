  <!-- logout-modal start  -->
  <div class="modal modal-five fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel4">{{ __('translate.Confirm') }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="logout-icon">
                <span>
                    <svg width="136" height="136" viewBox="0 0 136 136" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="68" cy="68" r="68" fill="#405FF2"></circle>
                        <path d="M69.8829 35.7891C71.1574 36.0357 72.4554 36.1967 73.7029 36.5423C81.5433 38.7098 87.2691 45.5378 87.956 53.6156C88.5098 60.1147 86.3061 65.6006 81.5029 70.0195C79.8344 71.5545 78.0482 72.9604 76.3394 74.4534C76.1256 74.6397 75.9639 75.0037 75.9589 75.2872C75.9269 77.2752 75.9421 79.2649 75.9421 81.2965C70.888 81.2965 65.8743 81.2965 60.79 81.2965C60.79 81.0616 60.79 80.8385 60.79 80.6137C60.79 76.5454 60.7984 72.4772 60.7782 68.4106C60.7765 67.9392 60.9297 67.649 61.2816 67.3537C64.5628 64.5957 67.8256 61.8175 71.1018 59.0545C72.2601 58.0781 72.9201 56.8702 72.9066 55.3419C72.8864 52.916 70.8594 50.9146 68.4216 50.8911C65.9686 50.8693 63.913 52.8053 63.8305 55.2328C63.8069 55.8988 63.8271 56.5665 63.8271 57.2695C58.7731 57.2695 53.7729 57.2695 48.6902 57.2695C48.6902 56.3149 48.6448 55.3385 48.697 54.3655C49.2205 44.699 56.7427 36.8745 66.4316 35.8914C66.5747 35.8763 66.7128 35.8243 66.8525 35.7891C67.8626 35.7891 68.8728 35.7891 69.8829 35.7891Z" fill="white"></path>
                        <path d="M67.483 100.209C66.1597 99.9258 64.9021 99.5081 63.8011 98.6777C61.3784 96.8474 60.2858 93.7689 61.0366 90.7878C61.7707 87.8737 64.2118 85.6693 67.2069 85.2147C71.271 84.599 75.2005 87.3671 75.8116 91.276C76.4918 95.6143 73.8183 99.3773 69.542 100.102C69.441 100.119 69.3467 100.171 69.2507 100.208C68.6615 100.209 68.0723 100.209 67.483 100.209Z" fill="white"></path>
                    </svg>

                </span>
              </div>

              <div class="logout-text">
                  <span>{{ __('translate.Are you sure you want to Logout') }}</span>

                  <h3>{{ __('translate.CARBAZ') }}</h3>
              </div>
          </div>


          <div class="modal-footer">

              <div class="modal-footer-btn">
                  <a href="{{ route('logout') }}" class="thm-btn-two  ">{{ __('translate.Yes Logout') }}</a>
                  <button type="button" class="thm-btn two" data-bs-dismiss="modal">{{ __('translate.Cancel') }}</button>
              </div>

          </div>

      </div>
  </div>
</div>
<!-- logout-modal end -->
