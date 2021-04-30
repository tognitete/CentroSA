<div class="row">
            <div class="col-md-offset-5 col-md-2  col-md-push-4"> 
            <div class="form-inline  menu ">
              <label for="nb_eng">Nombre d'enregistrement</label>
              <select id="nb_eng" name="nb_eng" class="form-control"  {{desactiver($nb)}}>
                <option></option>
                <option {{selection($nb,1)}}>1</option>
                <option {{selection($nb,2)}}>2</option>
                <option {{selection($nb,3)}}>3</option>
                <option {{selection($nb,4)}}>4</option>
                <option {{selection($nb,5)}}>5</option>
                <option {{selection($nb,6)}}>6</option>
                <option {{selection($nb,7)}}>7</option>
                <option {{selection($nb,8)}}>8</option>
                <option {{selection($nb,9)}}>9</option>
                <option {{selection($nb,10)}}>10</option>
              </select>
            </div>
            <input type="hidden" value="{{$nb}}" name="nb">
            </div>
          </div>