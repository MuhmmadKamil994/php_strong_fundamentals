
            <h1 class="font-semibold text-lg mb-4">Travel Information</h1>
            <div
              class="border border-gray-400 bg-gray-50 p-4 rounded-md text-sm text-gray-700 mb-6"
            >
              <strong>NOTE:</strong> Provide the following information
              concerning your travel plans.
            </div>
            <div class="mb-6">
              <h2 class="font-semibold te xt-md mb-2">
                Provide the following information:
              </h2>

              <div id="purpose-specify-container">
                <div
                  class="purpose-specify-block bg-[#f0f4f8] p-4 rounded-md mb-6 flex items-start gap-3"
                >
                  <div class="w-full">
                    <label for="purpose" class="font-semibold block mb-1"
                      >Purpose of Trip to the U.S.</label
                    >
                    <select
                    id="purpose"
                      name="purpose"
                      class="purpose w-full border border-gray-300 rounded px-3 py-2"
                    >
                      <option value="">--Select Purpose--</option>
                      <option value="A">FOREIGN GOVERNMENT OFFICIAL (A)</option>
                      <option value="B">
                        TEMP. BUSINESS PLEASURE VISITOR (B)
                      </option>
                      <option value="F">STUDENT (F)</option>
                      <option value="M">VOCATIONAL STUDENT (M)</option>
                      <option value="J">EXCHANGE VISITOR (J)</option>
                      <option value="H">TEMPORARY WORKER (H)</option>
                      <option value="L">INTRACOMPANY TRANSFEREE (L)</option>
                      <option value="O">
                        PERSON WITH EXTRAORDINARY ABILITY (O)
                      </option>
                      <option value="P">ATHLETE, ENTERTAINER (P)</option>
                      <option value="R">RELIGIOUS WORKER (R)</option>
                      <option value="E">TREATY TRADER / INVESTOR (E)</option>
                      <option value="C/D">CREWMEMBER / TRANSIT (C/D)</option>
                      <option value="K">
                        FIANCÉ(E) / SPOUSE OF U.S. CITIZEN (K)
                      </option>
                      <option value="Q">CULTURAL EXCHANGE (Q)</option>
                      <option value="SPECIAL">
                        SPECIAL CATEGORIES (T, U, S, V)
                      </option>
                    </select>
                  </div>
                  <div class="w-full">
                    <label class="font-semibold block mb-1">Specify</label>
                    <select
                      name="specify"
                      id="specipy"
                      class="specify w-full border border-gray-300 rounded px-3 py-2"
                    >
                      <option value="">--Select Specify--</option>
                    </select>
                  </div>
                  <button
                    type="button"
                    class="remove-btn hidden text-red-600 font-bold mt-6"
                  >
                    Remove
                  </button>
                </div>
              </div>

              <button
                type="button"
                id="add-purpose-specify"
                class="mt-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
              >
                Add Another
              </button>

              <div class="mt-6">
                <label class="font-semibold block mb-1"
                  >Application Receipt/Petition Number:</label
                >
                <input
                  type="text"
                  name="application_pnum"
                  class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                  required
                />
                <span class="text-gray-500 text-xs">(e.g., ABC1234567890)</span>
              </div>
            </div>

            <div class="mb-6">
              <label class="block font-semibold mb-1">
                Q: Have you made specific travel plans?
                <span
                  class="text-blue-600 cursor-pointer"
                  data-bs-toggle="tooltip"
                  title="If you are unsure of your Date of Arrival in U.S. or Date of Departure from U.S., please provide an estimate.
Date of Arrival in U.S."
                  >ℹ️</span
                >
              </label>
              <div class="flex space-x-4">
                <label>
                  <input
                    type="radio"
                    name="travel-plans"
                    value="yes"
                    required
                  />
                  Yes
                </label>
                <label>
                  <input type="radio" name="travel-plans" value="no" /> No
                </label>
              </div>
            </div>
            <div id="travel-plans-wrapper" class="hidden">
              <div id="Tplans-fields" class="mb-6">
                <div
                  class="mx-auto flex max-w-sm flex-col gap-y-4 rounded-xl bg-[#f0f4f8] p-6 shadow-lg outline outline-black/5 dark:bg-slate-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10"
                >
                  <label class="font-semibold text-med mb-2">
                    Provide a complete itinerary for your travel to the U.S:
                    <span
                      class="text-blue-600 cursor-pointer"
                      data-bs-toggle="tooltip"
                      title="If you are unsure of your Date of Arrival in U.S. or Date of Departure from U.S., please provide an estimate."
                      >ℹ️</span
                    >
                  </label>

                  <div class="mb-1">
                    <label for="arrival-date" class="block font-semibold mb-1">
                      Date of Arrival in U.S.
                    </label>
                    <input
                      type="date"
                      id="arrival-date"
                      name="arrival-date"
                      class="w-full border rounded px-3 py-2 mb-1"
                    />
                  </div>
                  <div>
                    <label for="Arrival-Flight" class="font-semibold mb-1 block"
                      >Arrival Flight (if know)</label
                    >
                    <input
                      type="text"
                      id="Arrival-flight"
                      class="w-full border rounded px-3 py-2"
                      required
                    />
                  </div>
                  <div>
                    <label for="Arrival-city" class="font-semibold mb-1 block"
                      >Arrival City</label
                    >
                    <input
                      type="text"
                      id="Arrival-city"
                      class="w-full border rounded px-3 py-2"
                      required
                    />
                  </div>
                  <div class="mb-1">
                    <label
                      for="departure-date"
                      class="block font-semibold mb-1"
                    >
                      Date of Departure from U.S.
                    </label>
                    <input
                      type="date"
                      id="departure-date"
                      name="departure-date"
                      class="w-full border rounded px-3 py-2 mb-1"
                    />
                  </div>
                  <div>
                    <label
                      for="Departure-Flight"
                      class="font-semibold mb-1 block"
                      >Departure Flight(if know)</label
                    >
                    <input
                      type="text"
                      id="Departure-Flight"
                      class="w-full border rounded px-3 py-2"
                      required
                    />
                  </div>
                  <div>
                    <label for="Departure-city" class="font-semibold mb-1 block"
                      >Departure City</label
                    >
                    <input
                      type="text"
                      id="Departure-city"
                      class="w-full border rounded px-3 py-2"
                      required
                    />
                  </div>

                  <div class="Location mb-4">
                    <h2 class="font-semibold text-md mb-2">
                      Provide the locations you plan to visit in the U.S.
                    </h2>

                    <div id="locations-container" class="space-y-2">
                      <div class="location-item flex items-center gap-2">
                        <input
                          type="text"
                          name="locations[]"
                          class="w-full border rounded px-3 py-2"
                          placeholder="Enter location"
                          required
                        />
                        <button
                          type="button"
                          class="remove-btn text-red-500 font-bold hidden"
                        >
                          X
                        </button>
                      </div>
                    </div>

                    <button
                      type="button"
                      id="add-location-btn"
                      class="mt-2 bg-green-600 text-white py-1 px-3 rounded hover:bg-green-700"
                    >
                      + Add Another Location
                    </button>
                  </div>

                  <div class="mb-8">
                    <h2 class="font-semibold text-lg mb-1">
                      Address Where You Will Stay in the U.S.
                    </h2>
                    <div>
                      <label for="Street1" class="font-semibold mb-1 block"
                        >Street Address (Line 1)</label
                      >
                      <input
                        type="text"
                        id="Street1"
                        name="Street1"
                        class="w-full border rounded px-3 py-2"
                        required
                      />
                    </div>

                    <div>
                      <label for="Street2" class="font-semibold mb-1 block"
                        >Street Address (Line 2)
                        <span class="text-red-500">*optional</span></label
                      >
                      <input
                        type="text"
                        id="Street2"
                        name="Street2"
                        class="w-full border rounded px-3 py-2"
                     
                      />
                    </div>
                    <div>
                      <label for="City" class="font-semibold mb-1 block"
                        >City</label
                      >
                      <input
                        type="text"
                        id="City"
                        name="City"
                        class="w-full border rounded px-3 py-2"
                        required
                      />
                    </div>
                    <div>
                      <label for="us-states" class="font-semibold mb-1 block"
                        >State</label
                      >
                      <select
                        id="us-states1"
                        name="us-states1"
                        class="us-states w-full border border-gray-300 rounded px-3 py-2"
                        required
                      >
                        <option value="">Loading states...</option>
                      </select>
                    </div>

                    <div>
                      <label for="Zcode" class="font-semibold mb-1 block"
                        >Zip Code (if know)</label
                      >
                      <input
                        type="number"
                        id="Zcode"
                        name="Zcode"
                        class="w-full border rounded px-3 py-2"
                        required
                      />
                      <span class="text-gray-500 text-xs"
                        >(e.g., 12345 or 12345-1234)</span
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <hr class="border-dotted border-gray-400 my-6" />

            <div id="no-travel-plans-wrapper" class="hidden">
              <div class="mb-6">
                <label class="font-semibold block mb-1"
                  >Intended Date of Arrival:</label
                >
                <input
                  type="date"
                  name="intended_date"
                  class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                  required
                />
              </div>

              <div class="mb-4">
                <label for="stay-time" class="font-semibold mb-1 block">
                  Intended Length of Stay in U.S
                </label>
                <div class="flex items-center gap-3">
                  <input
                    type="number"
                    id="stay-length"
                    name="stay-length"
                    maxlength="3"
                    class="w-16 text-center border rounded px-2 py-1"
                    required
                  />
                  <select
                    id="stay-time"
                    name="stay-time"
                    class="flex-grow border border-gray-300 rounded px-3 py-2"
                    required
                  >
                    <option value="">--Select Option--</option>
                    <option value="YE">YEAR(S)</option>
                    <option value="MO">MONTH(S)</option>
                    <option value="WE">WEEK(S)</option>
                    <option value="DA">DAY(S)</option>
                  </select>
                </div>
              </div>

              <div id="address-section" class="hidden mt-6">
                <h2 class="font-semibold text-lg mb-1">
                  Address Where You Will Stay in the U.S.
                </h2>

                <div>
                  <label for="Street1-intend" class="font-semibold mb-1 block"
                    >Street Address (Line 1)</label
                  >
                  <input
                    type="text"
                    id="Street1-intend"
                    class="w-full border rounded px-3 py-2"
                    required
                  />
                </div>

                <div>
                  <label for="Street2-intend" class="font-semibold mb-1 block"
                    >Street Address (Line 2)
                    <span class="text-red-500">*optional</span>
                  </label>
                  <input
                    type="text"
                    id="Street2-intend"
                    class="w-full border rounded px-3 py-2"
                   
                  />
                </div>
                <div>
                  <label for="City-intend" class="font-semibold mb-1 block"
                    >City</label
                  >
                  <input
                    type="text"
                    id="City-intend"
                    class="w-full border rounded px-3 py-2"
                    required
                  />
                </div>
                <div>
                  <label for="us-states" class="font-semibold mb-1 block"
                    >State</label
                  >
                  <select
                    id="us-states2"
                    name="us-states2"
                    class="us-states w-full border border-gray-300 rounded px-3 py-2"
                    required
                  >
                    <option value="">Loading states...</option>
                  </select>
                </div>
                <div>
                  <label for="Zcode-intend" class="font-semibold mb-1 block"
                    >Zip Code (if know)</label
                  >
                  <input
                    type="number"
                    id="Zcode-intend"
                    name="Zcode-intend"
                    class="w-full border rounded px-3 py-2"
                    required
                  />
                  <span class="text-gray-500 text-xs"
                    >(e.g., 12345 or 12345-1234)</span
                  >
                </div>
              </div>
            </div>

            <div class="mb-4">
              <label for="trip-payer" class="font-semibold mb-1 block">
                Person/Entity Paying for Your Trip
              </label>
              <select
                id="trip-payer"
                name="trip-payer"
                class="w-full border border-gray-300 rounded px-3 py-2"
                required
              >
                <option value="">--Select Option--</option>
                <option value="S">Self</option>
                <option value="UP">U.S. Petitioner</option>
                <option value="OP">Other Person</option>
                <option value="PE">Present Employer</option>
                <option value="ES">Employer in the U.S.</option>
                <option value="OC">Other Company/Organization</option>
              </select>
            </div>

            <!-- Other Person Section -->
            <div id="other-person-section" class="hidden mb-6">
              <h3 class="font-semibold mb-2">
                Provide the following information:
              </h3>
              <div>
                <label for="person-name" class="font-semibold mb-1 block"
                  >Surnames of Person Paying for Trip
                </label>
                <input
                  type="text"
                  id="person-name"
                  name="person-name"
                  class="w-full border rounded px-3 py-2"
                  required
                />
                <span class="text-gray-500 text-xs"
                  >(e(e.g., FERNANDEZ GARCIA))</span
                >
              </div>
              <div>
                <label for="person-gname" class="font-semibold mb-1 block"
                  >Given Names of Person Paying for Trip
                </label>
                <input
                  type="text"
                  id="person-gname"
                  name="person-gname"
                  class="w-full border rounded px-3 py-2"
                  required
                />
                <span class="text-gray-500 text-xs">(e.g., JUAN MIGUEL)</span>
              </div>
              <div>
                <label for="person-number" class="font-semibold mb-1 block"
                  >Telephone Number :
                </label>
                <input
                  type="number"
                  id="person-number"
                  name="person-number"
                  class="w-full border rounded px-3 py-2"
                  required
                />
              </div>
              <div class="state-toggle-block">
                <label for="person-gmail" class="font-semibold mb-1 block">
                  Email Address
                </label>
                <input
                  type="email"
                  name="person-gmail"
                  class="state-input w-full border rounded px-3 py-2"
                  required
                />
                <span class="text-gray-500 text-xs"
                  >((e.g., emailaddress@example.com))</span
                >
                <div class="flex items-center gap-2 text-sm mt-1">
                  <input type="checkbox" class="state-toggle-checkbox" />
                  <label>Does Not Apply</label>
                </div>
              </div>
              <div>
                <label for="your-relation" class="font-semibold mb-1 block"
                  >Relationship to You</label
                >
                <select
                  id="your-relation"
                  name="your-relation"
                  class="w-full border border-gray-300 rounded px-3 py-2"
                  required
                >
                  <option value="">--Select State--</option>
                  <option value="relative">Relative</option>
                  <option value="spouse">Spouse</option>
                  <option value="friend">Friend</option>
                  <option value="Ba">Business Associate</option>
                  <option value="child">Child</option>
                  <option value="other">Other</option>
                </select>
              </div>
              <div class="mb-4">
                <label class="block font-semibold mb-1">
                  Q: Is the address of the party paying for your trip the same
                  as your Home or Mailing Address?
                </label>
                <div class="flex space-x-6">
                  <label class="flex items-center gap-2">
                    <input type="radio" name="same-address" value="yes" />
                    Yes
                  </label>
                  <label class="flex items-center gap-2">
                    <input type="radio" name="same-address" value="no" />
                    No
                  </label>
                </div>
              </div>

              <!-- Company Address Section -->
              <div id="address-section-company" class="hidden mt-6">
                <h2 class="font-semibold text-lg mb-1">
                  Address of Company/Organization Paying
                  <span
                    class="text-blue-600 cursor-pointer"
                    title="Provide full address of the paying organization."
                    >ℹ️</span
                  >
                </h2>

                <div class="mb-2">
                  <label for="street" class="font-semibold block mb-1"
                    >Street Address (Line 1)</label
                  >
                  <input
                    type="text"
                    name="street"
                    class="w-full border rounded px-3 py-2"
                    required
                  />
                </div>

                <div class="mb-2">
                  <label for="street2" class="font-semibold block mb-1"
                    >Street Address (Line 2)
                    <span class="text-red-500">*optional</span>
                  </label>
                  <input name="street2" type="text" class="w-full border rounded px-3 py-2" />
                </div>

                <div class="mb-2">
                  <label for="city2" class="font-semibold block mb-1">City</label>
                  <input
                    type="text"
                    name="city2"
                    class="w-full border rounded px-3 py-2"
                     required
                  />
                </div>
                <div class="state-toggle-block">
                  <div class="mb-2">
                    <label for="state1" class="font-semibold block mb-1"
                      >State/Province</label
                    >
                    <input
                      type="text"
                      name="state1"
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
                  <div class="mb-2">
                    <label for="postal1" class="font-semibold block mb-1"
                      >Postal Code/Zip Code (if known)</label
                    >
                    <input
                      type="text"
                      name="postal1"
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
                  <label for="person-pay" class="font-semibold"
                    >Country/Region:
                  </label>
                  <select
                    id="person-pay"
                    name="person-pay"
                    class="w-full border rounded px-3 py-2"
                    required
                  >
                    <option>Select One</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- Organization/Company Section -->
            <div id="organization-section" class="hidden mb-6">
              <h3 class="font-semibold mb-2">Organization Paying Details</h3>
              <div>
                <label for="company-name" class="font-semibold mb-1 block"
                  >Name of Company/Organization Paying for Trip
                </label>
                <input
                  type="text"
                  id="company-name"
                  name="compay-name"
                  class="w-full border rounded px-3 py-2"
                  required
                />
              </div>
              <div>
                <label for="company-phone" class="font-semibold mb-1 block"
                  >Telephone Number
                </label>
                <input
                  type="number"
                  id="company-phone"
                  name="company-phone"
                  class="w-full border rounded px-3 py-2"
                  required
                />
              </div>
              <div>
                <label for="company-relation" class="font-semibold mb-1 block"
                  >Relationship to You</label
                >
                <input
                  type="text"
                  id="company-relation"
                  name="company-relation"
                  class="w-full border rounded px-3 py-2"
                  required
                />
              </div>
              <div id="address-section-company" class="mt-6">
                <h2 class="font-semibold text-lg mb-1">
                  Address of Company/Organization Paying<span
                    class="text-blue-600 cursor-pointer"
                    data-bs-toggle="tooltip"
                    title="Provide the street address, apartment number (if applicable), city, state or province, country, and postal zone (if applicable) of the person or organization that is paying for your travel."
                    >ℹ️</span
                  >
                </h2>
                <div>
                  <label for="Street1-company" class="font-semibold mb-1 block"
                    >Street Address (Line 1)</label
                  >
                  <input
                    type="text"
                    id="Street1-company"
                    name="Street1-company"
                    class="w-full border rounded px-3 py-2"
                    required
                  />
                </div>

                <div>
                  <label for="Street2-company" class="font-semibold mb-1 block"
                    >Street Address (Line 2)
                    <span class="text-red-500">*optional</span>
                  </label>
                  <input
                    type="text"
                    id="Street2-company"
                    name="Street2-company"
                    class="w-full border rounded px-3 py-2"
                   
                  />
                </div>
                <div>
                  <label for="City-company" class="font-semibold mb-1 block"
                    >City</label
                  >
                  <input
                    type="text"
                    id="City-company"
                    name="City-company"
                    class="w-full border rounded px-3 py-2"
                    required
                  />
                </div>
                <div class="state-toggle-block">
                  <label for="State-company" class="font-semibold mb-1 block">
                    State/Province
                  </label>
                  <input
                    type="text"
                    name="State-company"
                    class="state-input w-full border rounded px-3 py-2"
                    required
                  />
                  <div class="flex items-center gap-2 text-sm mt-1">
                    <input type="checkbox" class="state-toggle-checkbox" />
                    <label>Does Not Apply</label>
                  </div>
                </div>
                <div class="state-toggle-block">
                  <label for="State-company-zip" class="font-semibold mb-1 block">
                    Postal Code/Zip Code (if know)
                  </label>
                  <input
                    type="text"
                    name="State-company-zip"
                    class="state-input w-full border rounded px-3 py-2"
                    required
                  />
                  <div class="flex items-center gap-2 text-sm mt-1">
                    <input type="checkbox" class="state-toggle-checkbox" />
                    <label>Does Not Apply</label>
                  </div>
                </div>
              </div>

              <div>
                <label for="Company-pay" class="font-semibold"
                  >Country/Region:
                </label>
                <select
                  id="Company-pay"
                  name="Company-pay"
                  class="w-full border rounded px-3 py-2"
                  required
                >
                  <option>Select One</option>
                </select>
              </div>
            </div>
    