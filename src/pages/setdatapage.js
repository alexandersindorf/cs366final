import React, { useState } from 'react';
import './loginpage.css';

function SetDataPage() {

  return (
    <div class="center">
      <h1>Set Demographic Data</h1>
      <form method="post">
        <div>
            <label for = "age">Age Range</label>
            <select name = "age" id = "age">
                <option value = "1">18 - 29 Years</option>
                <option value = "3">30 - 39 Years</option>
                <option value = "4">40 - 49 Years</option>
                <option value = "5">50 - 59 Years</option>
                <option value = "6">60 - 69 Years</option>
                <option value = "7">70 - 79 Years</option>
                <option value = "8">80 Years and Above</option>
            </select>
        </div>
        <div>
            <label for = "state">State</label>
            <select name = "state" id = "state">
                <option value = "AL">Alabama</option>
                <option value = "AK">Alaska</option>
                <option value = "AZ">Arizona</option>
                <option value = "AR">Arkansas</option>
                <option value = "CA">California</option>
                <option value = "CO">Colorado</option>
                <option value = "CT">Connecticut</option>
                <option value = "DE">Delaware</option>
                <option value = "DOC">District of Columbia</option>
                <option value = "FL">Florida</option>
                <option value = "GA">Georgia</option>
                <option value = "HI">Hawaii</option>
                <option value = "ID">Idaho</option>
                <option value = "IL">Illinois</option>
                <option value = "IN">Indiana</option>
                <option value = "IA">Iowa</option>
                <option value = "KS">Kansas</option>
                <option value = "KY">Kentucky</option>
                <option value = "LA">Louisiana</option>
                <option value = "ME">Maine</option>
                <option value = "MD">Maryland</option>
                <option value = "MA">Massachusetts</option>
                <option value = "MI">Michigan</option>
                <option value = "MN">Minnesota</option>
                <option value = "MS">Mississippi</option>
                <option value = "MO">Missouri</option>
                <option value = "MT">Montana</option>
                <option value = "NE">Nebraska</option>
                <option value = "NV">Nevada</option>
                <option value = "NH">New Hampshire</option>
                <option value = "NJ">New Jersey</option>
                <option value = "NM">New Mexico</option>
                <option value = "NY">New York</option>
                <option value = "NC">North Carolina</option>
                <option value = "ND">North Dakota</option>
                <option value = "OH">Ohio</option>
                <option value = "OK">Oklahoma</option>
                <option value = "OR">Oregon</option>
                <option value = "PA">Pennsylvania</option>
                <option value = "RI">Rhode Island</option>
                <option value = "SC">South Carolina</option>
                <option value = "SD">South Dakota</option>
                <option value = "TN">Tennessee</option>
                <option value = "TX">Texas</option>
                <option value = "UT">Utah</option>
                <option value = "VT">Vermont</option>
                <option value = "VA">Virginia</option>
                <option value = "WA">Washington</option>
                <option value = "WV">West Virginia</option>
                <option value = "WI">Wisconsin</option>
                <option value = "WY">Wyoming</option>
            </select>
        </div>
        <div>
            <label for = "race">Race</label>
            <select name = "race" id = "race">
                <option value = "HoL">Hispanic or Latino</option>
                <option value = "aSR">Non-Hispanic Asian, Single Race</option>
                <option value = "bSR">Non-Hispanic Black, Single Race</option>
                <option value = "wSR">Non-Hispanic White, Single Race</option>
                <option value = "oR">Non-Hispanic, Other Races and Multiple Races</option>
            </select>
        </div>
        <div>
            <label for = "edu">Education</label>
            <select name = "edu" id = "edu">
                <option value = "HSD">Less than a High School Deploma</option>
                <option value = "GED">High School Diploma or GED</option>
                <option value = "CAD">Some College/Associate's Degree</option>
                <option value = "BDH">Bachelor's Degree or Higher</option>
            </select>
        </div>
        <div>
            <p>Sexual Orientaiton</p>
            <input type = "radio" id = "gl"></input>
            <label for = "gl">Gay or Lesbian</label>
            <input type = "radio" id = "st"></input>
            <label for = "st">Straight</label>
            <input type = "radio" id = "bi"></input>
            <label for = "bi">Bisexual</label>
        </div>
        <div>
            <p>Sex</p>
            <input type = "radio" id = "fe"></input>
            <label for = "fe">Female</label>
            <input type = "radio" id = "ma"></input>
            <label for = "ma">Male</label>
        </div>
        <div>
            <p>Gender Identity</p>
            <input type = "radio" id = "cgm"></input>
            <label for = "cgm">Cis-gender Male</label>
            <input type = "radio" id = "cgf"></input>
            <label for = "cgf">Cis-gender Female</label>
            <input type = "radio" id = "trg"></input>
            <label for = "trg">Transgender</label>
        </div>
        <div>
            <p>Disability Status</p>
            <input type = "radio" id = "yd"></input>
            <label for = "yd">With Disability</label>
            <input type = "radio" id = "nd"></input>
            <label for = "nd">Without Disability</label>
        </div>
        <div class="pass">Set Demographics</div>
        <input type="submit" value="Set"/>
      </form>
    </div>
  );
}

export default SetDataPage;