
            <h1 class="font-semibold text-lg mb-2">
              Address and Phone Information
            </h1>
            <div id="Personal-addres" class="mt-6">
              <h1 class="font-semibold text-lg mb-4">Home</h1>
              <div class="mb-2">
                <label for="street3" class="font-semibold block mb-1"
                  >Street Address (Line 1)</label
                >
                <input
                  type="text"
                  name="street3"
                  class="w-full border rounded px-3 py-2"
                  required
                />
              </div>

              <div class="mb-2">
                <label for="street4" class="font-semibold block mb-1"
                  >Street Address (Line 2)
                  <span class="text-red-500">*optional</span></label
                >
                <input name="street4" type="text" class="w-full border rounded px-3 py-2" />
              </div>

              <div class="mb-2">
                <label for="city3" class="font-semibold block mb-1">City</label>
                <input
                  name="city3"
                  type="text"
                  class="w-full border rounded px-3 py-2"
                 required
                />
              </div>
              <div class="state-toggle-block">
                <div class="mb-4">
                  <label for="province2" class="font-semibold block mb-1">State/Province</label>
                  <input
                  name="province2"
                    type="text"
                    class="w-full border rounded px-3 py-2 state-input"
                    required
                  />
                  <div class="flex items-center gap-2 text-sm mt-1">
                    <input type="checkbox" class="state-toggle-checkbox" />
                    <label>Does Not Apply</label>
                  </div>
                </div>
              </div>
              <div class="state-toggle-block">
                <div class="mb-4">
                  <label for="zcode2" class="font-semibold block mb-1"
                    >Postal Code/Zip Code (if known)</label
                  >
                  <input
                    type="text"
                    name="zcode2"
                    class="w-full border rounded px-3 py-2 state-input"
                    required
                  />
                  <div class="flex items-center gap-2 text-sm mt-1">
                    <input type="checkbox" class="state-toggle-checkbox" />
                    <label>Does Not Apply</label>
                  </div>
                </div>
              </div>
              <div>
                <label for="personal-country" class="font-semibold"
                  >Country/Region:
                </label>
                <select
                  id="personal-country"
                  name="personal-country"
                  class="w-full border rounded px-3 py-2"
                  required
                >
                  <option>Select One</option>
                </select>
              </div>
             
              <div class="mb-4 mt-2">
                <label class="block font-semibold mb-2"
                  >Q:Is your Mailing Address the same as your Home
                  Address?</label
                >
                <div class="flex space-x-4">
                  <label
                    ><input
                      type="radio"
                      name="personal-mail"
                      value="yes"
                      id="personal-mail-yes"
                      required
                    />
                    Yes</label
                  >
                  <label
                    ><input
                      type="radio"
                      id="personal-mail-no"
                      name="personal-mail"
                      value="no"
                    />
                    No</label
                  >
                </div>
              </div>
              <div
                id="personal-mail-details"
                class="fmx-auto hidden flex max-w-sm flex-col gap-y-4 rounded-xl p-6 shadow-lg outline outline-black/5 dark:bg-slate-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10 bg-[#f0f4f8]"
              >
                <h1 class="font-semibold text-lg mb-4">Mail Address</h1>
                <div class="mb-4">
                  <label for="street5" class="font-semibold block mb-1"
                    >Street Address (Line 1)</label
                  >
                  <input
                    type="text"
                    name="street5"
                    class="w-full border rounded px-3 py-2"
                    required
                  />
                </div>

                <div class="mb-4">
                  <label for="streetOP" class="font-semibold block mb-1"
                    >Street Address (Line 2)
                    <span class="text-red-500">*optional</span></label
                  >
                  <input name="streetOp" type="text" class="w-full border rounded px-3 py-2" />
                </div>

                <div class="mb-4">
                  <label for="city4" class="font-semibold block mb-1">City</label>
                  <input
                    type="text"
                    name="city4"
                    class="w-full border rounded px-3 py-2"
                    required
                  />
                </div>
                <div class="state-toggle-block">
                  <div class="mb-4">
                    <label for="province" class="font-semibold block mb-1"
                      >State/Province</label
                    >
                    <input
                    name="province"
                      type="text"
                      class="w-full border rounded px-3 py-2 state-input"
                      required
                    />
                    <div class="flex items-center gap-2 text-sm mt-1">
                      <input type="checkbox" class="state-toggle-checkbox" />
                      <label>Does Not Apply</label>
                    </div>
                  </div>
                </div>
                <div class="state-toggle-block">
                  <div class="mb-4">
                    <label for="zcode3" class="font-semibold block mb-1"
                      >Postal Code/Zip Code (if known)</label
                    >
                    <input
                      type="text"
                      name="zcode3"
                      class="w-full border rounded px-3 py-2 state-input"
                      required
                    />
                    <div class="flex items-center gap-2 text-sm mt-1">
                      <input type="checkbox" class="state-toggle-checkbox" />
                      <label>Does Not Apply</label>
                    </div>
                  </div>
                </div>
                <div>
                  <label for="mailing-country" class="font-semibold"
                    >Country/Region:
                  </label>
                  <select
                    id="mailing-country"
                    name="mailing-country"
                    class="w-full border rounded px-3 py-2"
                    required
                  >
                    <option>Select One</option>
                  </select>
                </div>
              </div>
            </div>
            <div
              class="mt-6 p-4 border border-gray-300 rounded-lg bg-white shadow-sm"
            >
              <h1 class="font-semibold text-lg mb-4">
                Phone
                <span
                  class="text-blue-600 cursor-pointer"
                  data-bs-toggle="tooltip"
                  title="You must provide a primary phone number. The primary phone number should be the phone number at which you are most likely to be reached; this could be a land line or a cellular/mobile number. If you have an additional land line or a cellular/mobile number please list that as your secondary phone number."
                  >ℹ️</span
                >
              </h1>

              <div class="mb-4">
                <label for="p-number"  class="font-semibold block mb-1"
                  >Primary Phone Number</label
                >
                <input
                  type="text"
                  name="p-number"
                  class="w-full border rounded px-3 py-2"
                  required
                />
              </div>

              <div class="state-toggle-block mb-4">
                <label for="s-number" class="font-semibold block mb-1"
                  >Secondary Phone Number</label
                >
                <input
                name="s-number"
                  type="text"
                  class="w-full border rounded px-3 py-2 state-input"
                  required
                />
                <div class="flex items-center gap-2 text-sm mt-1">
                  <input type="checkbox" class="state-toggle-checkbox" />
                  <label>Does Not Apply</label>
                </div>
              </div>

              <!-- Work Phone -->
              <div class="state-toggle-block">
                <label for="w-number" class="font-semibold block mb-1"
                  >Work Phone Number</label
                >
                <input
                name="w-number"
                  type="text"
                  class="w-full border rounded px-3 py-2 state-input"
                  required
                />
                <div class="flex items-center gap-2 text-sm mt-1">
                  <input type="checkbox" class="state-toggle-checkbox" />
                  <label>Does Not Apply</label>
                </div>
              </div>
              <div id="old-number-details" class="mb-4 mt-2">
                <label class="block font-semibold mb-2"
                  >Q:Have you used any other phone numbers in the last five
                  years? ?</label
                >
                <div class="flex space-x-4">
                  <label
                    ><input
                      type="radio"
                      name="old-number"
                      value="yes"
                      id="old-number-yes"
                      required
                    />
                    Yes</label
                  >
                  <label
                    ><input
                      type="radio"
                      id="old-number-no"
                      name="old-number"
                      value="no"
                    />
                    No</label
                  >
                </div>
              </div>
              <div
                id="old-number-section"
                class="mb-4 bg-[#f0f4f8] hidden p-4 rounded-lg shadow-sm"
              >
                <div id="phone-container">
                  <div class="mb-4 phone-block">
                    <label for="a-number" class="font-semibold block mb-1"
                      >Additional Phone Number</label
                    >
                    <input
                    name="a-number"
                      type="text"
                      class="w-full border rounded px-3 py-2"
                      required
                    />
                  </div>
                </div>

                <div class="flex gap-2 mt-2">
                  <button
                    type="button"
                    id="add-phone-btn"
                    class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition-colors"
                  >
                    + Add Another
                  </button>
                  <button
                    type="button"
                    id="remove-phone-btn"
                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 hidden transition-colors"
                  >
                    - Remove
                  </button>
                </div>
              </div>
            </div>

            <div
              class="mt-6 p-4 border border-gray-300 rounded-lg bg-white shadow-sm"
            >
              <div class="mb-4">
                <label for="person-gmail1" class="font-semibold mb-1 block"
                  >Email Address</label
                >
                <input
                  type="email"
                  id="person-gmail1"
                  name="person-gmail1"
                  class="state-input w-full border rounded px-3 py-2"
                  required
                />
                <span class="text-gray-500 text-xs"
                  >(e.g., emailaddress@example.com)</span
                >
              </div>
            </div>
             <div
                id="other-social-section"
                class="mb-4 bg-[#f0f4f8] hidden p-4 rounded-lg shadow-sm"
              >
                <p class="text-sm text-gray-700 mb-4">
                  Please provide the name of the platform and the associated
                  unique social media identifier (username or handle) for each
                  social media platform you would like to list. This does not
                  include private messaging on person-to-person messaging
                  services, such as WhatsApp.
                </p>

                <div id="other-social-container">
                  <div
                    class="mb-4 other-social-block flex flex-col gap-2 md:flex-row md:items-center"
                  >
                    <div class="flex-1">
                      <label for="additional-socialmediaP"  class="block font-semibold mb-1"
                        >Additional Social Media Platform</label
                      >
                      <input
                      name="additional-socialmediaP"
                        type="text"
                        class="w-full border rounded px-3 py-2"
                        required
                      />
                    </div>

                    <div class="flex-1">
                      <label for="additional-socialmediaH" class="block font-semibold mb-1"
                        >Additional Social Media Handle</label
                      >
                      <input
                      name="additional-socialmediaH"
                        type="text"
                        class="w-full border rounded px-3 py-2"
                        required
                      />
                    </div>
                  </div>
                </div>

                <div class="flex gap-2 mt-2">
                  <button
                    type="button"
                    id="add-other-social-btn"
                    class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition-colors"
                  >
                    + Add Another
                  </button>
                  <button
                    type="button"
                    id="remove-other-social-btn"
                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 hidden transition-colors"
                  >
                    - Remove
                  </button>
                </div>
              </div>
               <div
              class="mt-6 p-4 border border-gray-300 rounded-lg bg-white shadow-sm"
            >
              <h2 class="font-semibold text-lg mb-2">
                Social Media
                <span
                  class="text-blue-600 cursor-pointer"
                  data-bs-toggle="tooltip"
                  title="Enter information associated with your online presence, including the types of online providers/platforms, applications and websites that you use to collaborate, share information, and interact with others. List the username, handle, screen-name, or other identifiers associated with your social media profile. (You do not need to list accounts designed for use by multiple users within a business or other organization.)"
                  >ℹ️</span
                >
              </h2>
              <p class="text-gray-700 text-sm mb-4">
                Do you have a social media presence?<br />
                Select from the list below each social media platform you have
                used within the last five years. In the space next to the
                platform’s name, enter the username or handle you have used on
                that platform.
                <span class="font-semibold"
                  >Please do not provide your passwords.</span
                ><br />
                If you have used more than one platform or more than one
                username or handle on a single platform, click the
                <em>'Add Another'</em> button to list each one separately. If
                you have not used any of the listed social media platforms in
                the last five years, select <strong>'None'</strong>.
              </p>

              <div class="mb-4">
                <label class="block font-semibold mb-2"
                  >Do you have a social media presence?</label
                >
                <div class="flex space-x-4">
                  <label>
                    <input
                      type="radio"
                      name="social-media-presence"
                      value="yes"
                      id="social-media-yes"
                      required
                    />
                    Yes
                  </label>
                  <label>
                    <input
                      type="radio"
                      name="social-media-presence"
                      value="no"
                      id="social-media-no"
                    />
                    No
                  </label>
                </div>
              </div>

              <div
                id="social-media-section"
                class="hidden bg-[#f0f4f8] p-4 rounded-lg shadow-sm"
              >
                <div id="social-media-container">
                  <div
                    class="mb-4 social-media-block flex flex-col gap-2 md:flex-row md:items-center"
                  >
                    <div class="flex-1">
                      <label class="block font-semibold mb-1">Platform</label>
                      <select class="w-full border rounded px-3 py-2" required>
                        <option value="">Select Platform</option>
                        <option value="askfm">Ask.FM</option>
                        <option value="douban">Douban</option>
                        <option value="facebook">Facebook</option>
                        <option value="flickr">Flickr</option>
                        <option value="googleplus">Google+</option>
                        <option value="instagram">Instagram</option>
                        <option value="linkedin">LinkedIn</option>
                        <option value="myspace">Myspace</option>
                        <option value="pinterest">Pinterest</option>
                        <option value="qzone">Qzone (QQ)</option>
                        <option value="reddit">Reddit</option>
                        <option value="sinaweibo">Sina Weibo</option>
                        <option value="tencentweibo">Tencent Weibo</option>
                        <option value="tumblr">Tumblr</option>
                        <option value="twitter">Twitter (X)</option>
                        <option value="twoo">Twoo</option>
                        <option value="vine">Vine</option>
                        <option value="vkontakte">Vkontakte (VK)</option>
                        <option value="youku">Youku</option>
                        <option value="youtube">YouTube</option>
                        <option value="none">None</option>
                      </select>
                    </div>

                    <div class="flex-1">
                      <label for="Username" class="block font-semibold mb-1"
                        >Username/Handle</label
                      >
                      <input
                      name="Username"
                        type="text"
                        class="w-full border rounded px-3 py-2"
                        required
                      />
                    </div>
                  </div>
                </div>

                <div class="flex gap-2 mt-2">
                  <button
                    type="button"
                    id="add-social-btn"
                    class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition-colors"
                  >
                    + Add Another
                  </button>
                  <button
                    type="button"
                    id="remove-social-btn"
                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 hidden transition-colors"
                  >
                    - Remove
                  </button>
                </div>
              </div>
              <div id="other-social-details" class="mb-4 mt-2">
                <label class="block font-semibold mb-2">
                  Q: Do you wish to provide information about your presence on
                  any other websites or applications you have used within the
                  last five years to create or share content (photos, videos,
                  status updates, etc.)?
                </label>
                <div class="flex space-x-4">
                  <label>
                    <input
                      type="radio"
                      name="other-social"
                      value="yes"
                      id="other-social-yes"
                      required
                    />
                    Yes
                  </label>
                  <label>
                    <input
                      type="radio"
                      id="other-social-no"
                      name="other-social"
                      value="no"
                    />
                    No
                  </label>
                </div>
              </div>

              
            </div>
                <div44 id="old-email-details" class="mb-4 mt-2">
                <label class="block font-semibold mb-2">
                  Q: Have you used any other email addresses in the last five
                  years?
                </label>
                <div class="flex space-x-4">
                  <label>
                    <input
                      type="radio"
                      name="old-email"
                      value="yes"
                      id="old-email-yes"
                      required
                    />
                    Yes
                  </label>
                  <label>
                    <input
                      type="radio"
                      id="old-email-no"
                      name="old-email"
                      value="no"
                    />
                    No
                  </label>
                </div>
              </div44>

              <div
                id="old-email-section"
                class="mb-4 bg-[#f0f4f8] hidden p-4 rounded-lg shadow-sm"
              >
                <div id="email-container">
                  <div class="mb-4 email-block">
                    <label for="additional-addres" class="font-semibold block mb-1"
                      >Additional Email Address</label
                    >
                    <input
                      type="email"
                      name="additional-addres"
                      class="w-full border rounded px-3 py-2"
                      required
                    />
                  </div>
                </div>
                <div class="flex gap-2 mt-2">
                  <button
                    type="button"
                    id="add-email-btn"
                    class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition-colors"
                  >
                    + Add Another
                  </button>
                  <button
                    type="button"
                    id="remove-email-btn"
                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 hidden transition-colors"
                  >
                    - Remove
                  </button>
                </div>
              </div>
       