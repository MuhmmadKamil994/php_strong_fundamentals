
            <h1 class="font-semibold text-lg mb-4">U.S Contact Information</h1>
            <h3 class="font-semibold text-lg mb-2">
              Contact Person or Organization in the United States:
            </h3>
            <div
              id="U.S-person-details"
              class="fmx-auto flex sm-w-sm flex-col gap-y-2 rounded-xl p-6 shadow-lg outline outline-black/5 dark:bg-slate-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10 bg-[#f0f4f8] mt-4"
            >
              <div id="Contact-check">
                <h3 class="font-semibold text-lg mb-4">
                  Contact Person
                  <span
                    class="text-blue-600 cursor-pointer"
                    data-bs-toggle="tooltip"
                    title="Your U.S. Point of Contact can be any individual in the U.S. who knows you and can verify, if necessary, your identity. If you do not personally know anyone in the U.S., you may enter the name of the store, company, or organization you plan to visit during your trip"
                    >ℹ️</span
                  >
                </h3>
                <div class="mb-2">
                  <label for="Sname" class="font-semibold block mb-1">Surnames</label>
                  <input
                    type="text"
                    name="Sname"
                    class="w-full border rounded px-3 py-2"
                    required
                  />
                </div>
                <div class="mt-1">
                  <label for="Gname" class="font-semibold">Given Names</label>
                  <input
                  name="Gname"
                    type="text"
                    class="w-full border rounded px-3 py-2"
                    required
                  />
                </div>
                <div class="mt-0">
                  <input
                    type="checkbox"
                    id="contact-does-not-know"
                    class="mr-2"
                  />
                  <label for="contact-does-not-know" class="text-sm"
                    >Does Not Know</label
                  >
                </div>
              </div>

              <div id="Organization-check" class="mt-4">
                <label for="organization-name" class="font-semibold">Organization Name</label>
                <input
                  type="text"
                  name="organization-name"
                  class="w-full border rounded px-3 py-2"
                  required
                />
                <div class="mt-0">
                  <input
                    type="checkbox"
                    id="organization-does-not-know"
                    class="mr-2"
                  />
                  <label for="organization-does-not-know" class="text-sm"
                    >Does Not Know</label
                  >
                </div>
              </div>
              <div class="mb-4">
                <label for="relationship" class="font-semibold block mb-1"
                  >Relationship to You</label
                >
                <select
                  id="relationship"
                  name="relationship"
                  class="w-full border rounded px-3 py-2"
                  required
                >
                  <option value="">Select One</option>
                  <option value="spouse">Spouse</option>
                  <option value="fiancee">Relative</option>
                  <option value="friend">Friend</option>
                  <option value="parent">Parent</option>
                  <option value="sibling">School Employer</option>
                  <option value="business-associate">Business Associate</option>
                  <option value="employer">Employer</option>
                  <option value="other">Other</option>
                </select>
              </div>
              <div id="US-relation-addres" class="mt-4 hidden">
                <h3 class="font-semibold text-lg mb-4">
                  Address and Phone Number of Point of Contact
                </h3>
                <div class="mb-2">
                  <label for="us-address" class="font-semibold block mb-1"
                    >U.S Street Address (Line 1)</label
                  >
                  <input
                  name="us-address"
                    type="text"
                    class="w-full border rounded px-3 py-2"
                    required
                  />
                </div>

                <div class="mb-2">
                  <label for="us-address-line2" class="font-semibold block mb-1"
                    >U.S Street Address (Line 2)
                    <span class="text-red-500">*optional</span></label
                  >
                  <input name="us-address-line2" type="text" class="w-full border rounded px-3 py-2" />
                </div>

                <div class="mb-2">
                  <label for="city6" class="font-semibold block mb-1">City</label>
                  <input
                  name="city6"
                    type="text"
                    class="w-full border rounded px-3 py-2"
                    required
                  />
                </div>
                <div>
                  <label for="us-states" class="font-semibold mb-1 block"
                    >State</label
                  >
                  <select
                    id="us-states4"
                    name="us-states4"
                    class="us-states w-full border border-gray-300 rounded px-3 py-2"
                    required
                  >
                    <option value="">Loading states...</option>
                  </select>
                </div>
                <div class="mb-4">
                  <label for="us-phone" class="font-semibold block mb-1"> Phone Number</label>
                  <input
                    type="text"
                    name="us-phone"
                    class="w-full border rounded px-3 py-2"
                    required
                  />
                  <span class="text-gray-500 text-xs">(e.g., 5555555555)</span>
                </div>
                <div class="mb-4">
                  <label for="us-postal" class="font-semibold block mb-1"
                    >Postal Code/Zip Code (if known)</label
                  >
                  <input
                  name="us-postal"
                    type="text"
                    class="w-full border rounded px-3 py-2 state-input"
                    required
                  />
                  <span class="text-gray-500 text-xs"
                    >(e.g., 55555 or 55555-5555)</span
                  >
                </div>
                <div class="state-toggle-block">
                  <div class="mb-4">
                    <label for="us-email" class="font-semibold block mb-1"
                      >Email Address</label
                    >
                    <input
                    name="us-email"
                      type="email"
                      class="w-full border rounded px-3 py-2 state-input"
                      required
                    />
                    <span class="text-gray-500 text-xs"
                      >(e.g., emailaddress@example.com)</span
                    >
                    <div class="flex items-center gap-2 text-sm mt-1">
                      <input type="checkbox" class="state-toggle-checkbox" />
                      <label>Does Not Apply</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
       