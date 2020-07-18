
		_ckbJogos=document.querySelector('#pro_status');
		
		function checadoJ(){
			if(_ckbJogos.checked){
				_ckbJogos.setAttribute('title', 'Ativado');
			}else{
				_ckbJogos.setAttribute('title', 'Desativado');
			}
		}

		_ckbPecas=document.querySelector('#pec_status');

		function checadoṔ(){
			if(_ckbPecas.checked){
				_ckbPecas.setAttribute('title', 'Ativado');
			}else{
				_ckbPecas.setAttribute('title', 'Desativado');
			}
		}

		_ckbComputador=document.querySelector('#com_status');
		function checadoC(){
			if(_ckbComputador.checked){
				_ckbComputador.setAttribute('title', 'Ativado');
			}else{
				_ckbComputador.setAttribute('title', 'Desativado');
			}
		}

		_ckbManutencao=document.querySelector('#man_status');
		function checadoM(){
			if(_ckbManutencao.checked){
				_ckbManutencao.setAttribute('title', 'Ativado');
			}else{
				_ckbManutencao.setAttribute('title', 'Desativado');
			}
		}