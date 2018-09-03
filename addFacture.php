<article class="hero">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Ajout d'une facture
            </h1>
        </div>
    </div>
</article>
<div class="columns">
    <div class="column is-offset-2 is-4">
        <div class="field">
            <label class="label">Numéro de la facture</label>
            <div class="control">
                <input class="input" type="text" placeholder="Numéro de la facture">
            </div>
            <p class="help is-danger">This input is invalid</p>
        </div>
        <div class="field">
            <label class="label">Date de la facture</label>
            <div class="control">
                <input class="input" type="date" placeholder="Date de la facture">
            </div>
            <p class="help is-danger">This input is invalid</p>
        </div>
        <div class="field">
            <label class="label">Numéro de la commande</label>
            <div class="control">
                <input class="input" type="text" placeholder="Numéro de la commande">
            </div>
            <p class="help is-danger">This input is invalid</p>
        </div>
        <div class="field">
            <label class="label">Objet</label>
            <div class="control">
                <input class="input" type="text" placeholder="Objet">
            </div>
            <p class="help is-danger">This input is invalid</p>
        </div>
        <div class="columns is-multiline ">
            <div class="field column is-half">
                <label class="label">Société</label>
                <div class="field has-addons">
                    <div class="control">
                        <input class="input" type="text" placeholder="Société">
                    </div>
                    <div class="control">
                        <a class="button is-info">
                            Search
                        </a>
                    </div>
                </div>
                <p class="help is-danger">This input is invalid</p>
            </div>
            <div class="field column is-half">
                <label class="label">Personne de contact</label>
                <div class="field has-addons">
                    <div class="control">
                        <input class="input" type="text" placeholder="Personne de contact">
                    </div>
                    <div class="control">
                        <a class="button is-info">
                            Search
                        </a>
                    </div>
                </div>
                <p class="help is-danger">This input is invalid</p>
            </div>
        </div>
        <div class="field is-grouped is-grouped-centered">
          <div class="control">
            <button class="button is-rounded">Créer une facture</button>
          </div>
        </div>
    </div>
    <div class="column is-5">
        <table class="table is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th><abbr title="Prix/Unitaire">P./U.</abbr></th>
                    <th>Prix</th>
                    <th>Remise</th>
                    <th>TVA</th>
                    <th>Prix HTVA</th>
                </tr>
            </thead>
        </table>
        <div class="columns">
            <p class="column"><strong>Total HTVA : </strong></p>
            <p class="column"><strong>TVA : </strong></p>
            <p class="column"><strong>Total TTC : </strong></p>
        </div>
    </div>
</div>