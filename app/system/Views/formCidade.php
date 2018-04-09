<div class="content">

	<fieldset>
	   <legend>Cadastrar cidade</legend>
	   
	
		<form method="POST" action="http://localhost/framework/public/painel/cidade">
			
			<table>
				<tr>
					<td><label>Nome da cidade</label></td>
					<td><label>Código Postal</label></td>
					<td><label>Estado</label></td>
					<td><label>Pais</label></td>
					<td rowspan="2"><input type="submit" value="Inserir" style="height: 100%;"></td>			
				</tr>
				<tr>
					<td><input type="text" name="nome"></td>
					<td><input type="number" name="codPostal" placeholder="00000000"></td>
					<td><select type="text" name="estado">
							<option value="">Selecionar</option>
							<option value="AC">AC</option>
							<option value="AL">AL</option>
							<option value="AP">AP</option>
							<option value="AM">AM</option>
							<option value="BA">BA</option>
							<option value="CE">CE</option>
							<option value="DF">DF</option>
							<option value="ES">ES</option>
							<option value="GO">GO</option>
							<option value="MA">MA</option>
							<option value="MT">MT</option>
							<option value="MS">MS</option>
							<option value="MG">MG</option>
							<option value="PA">PA</option>
							<option value="PB">PB</option>
							<option value="PR">PR</option>
							<option value="PE">PE</option>
							<option value="PI">PI</option>
							<option value="RJ">RJ</option>
							<option value="RN">RN</option>
							<option value="RS">RS</option>
							<option value="RO">RO</option>
							<option value="RR">RR</option>
							<option value="SC">SC</option>
							<option value="SP">SP</option>
							<option value="SE">SE</option>
							<option value="TO">TO</option>
						</select>
					</td>
					<td><input type="text" name="pais" value="Brasil"></td>
				</tr>
			</table>

		</form>
	</fieldset>
	<br><br>
		<table class="dados">
			<tr>
				<th><label>Nome da cidade</label></th>
				<th><label>Código Postal</label></th>
				<th><label>Estado</label></th>
				<th><label>Pais</label></th>	
				<th colspan="2"><label>-</label></th>
			</tr>

		<?php


			foreach ($dados as $key => $value) {
			
			if($key%2 == 0){
				echo "<tr>";
			} else {
				echo "<tr class='l1'>";
			}

				
		?>
				
					<td><?php echo $value['nome'];?></td>
					<td><?php echo $value['codPostal'];?></td>
					<td><?php echo $value['estado'];?></td>
					<td><?php echo $value['pais'];?></td>
					<td class="tdBtn editar"><a href="#">Editar</a></td>
					<td class="tdBtn excluir"><a href="http://localhost/framework/public/painel/cidade/delete/<?php echo $value['codCidade'];?>">Excluir</a></td>
				</tr>

		<?php
				}		

		?>
		</table>

		<div class="buttons">
			<h3>Cadastrar</h3>
			<h3>Buscar</h3>
		</div>
	

</div>