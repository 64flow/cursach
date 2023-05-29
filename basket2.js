function showAddworksForClient(additionalworks, project_id, project_price, project_name, total_price) {
	clearContainer();
	GetRequest("/scripts/getAddworks.php", function(data) {
		var container = document.getElementsByClassName('container')[0];
		var list = Create('div', 'add-works-list', container);
 
		Create('div', 'list-title', list, 'Список дополнительных услуг');
 
		var description = Create('div', 'add-works-description', list);
		var row = Create('div', 'add-works-description-row-title', description);
		Create('div', 'add-works-description-key', row, 'Наименование услуги');
		Create('div', 'add-works-description-key', row, 'Стоимость услуги');
		Create('div', 'add-works-description-key', row, 'Тип материала');
 
		for(var a in data)
		{
			var addwork = data[a];
			var row  = Create('div', 'add-works-description-row', description);
			row.setAttribute("data-addworkID", addwork['Work_Id']);
			row.onclick = function() {
				var addwork_id = this.getAttribute("data-addworkID");
				addworkForClientInfoWindow(addwork_id, additionalworks, total_price);
			}
			Create('div', 'add-works-description-value', row, addwork['Work_Name']);
			Create('div', 'add-works-description-value', row, normalizeCost(addwork['Full_Price']) + ' ₽');
			Create('div', 'add-works-description-value', row, addwork['Material_Name']);
		}
		var buttons = Create('div', 'buttons', list);
		var confirm = Create('supp_button', null, buttons, 'Оформить заказ');
		confirm.onclick = function() {
			uModal("Подтверждение заказа", true, false, true, false);
			var body = umodal.ubody;
			Create("div", "personal-data-enter", body, 'Для завершения оформления Вашего заказа ознакомьтесь с информацией и нажмите на кнопку "Подтвердить заказ" :');
			total_price = project_price;
			total_price_int = parseInt(total_price);
			var tot_cost = Create('div', 'personal-data-total', body);
			Create("div", "personal-data-key-total", tot_cost, 'Итоговая стоимость');
			var personalData = Create("div", "personal-data", body);
			Create("div", "personal-data-key", personalData, 'Наименование проекта дома');
			Create("div", "personal-data-value", personalData, project_name);
			Create("div", "personal-data-key", personalData, 'Стоимость проекта дома');
			Create("div", "personal-data-value", personalData, normalizeCost(project_price) + ' ₽');
 
			if (additionalworks.length != 0) {
				var additionalWorks = Create('div', 'personal-data', body);
				Create('div', 'personal-data-key', additionalWorks, 'Дополнительные услуги');
 
				for (var i = 0; i < additionalworks.length; i++)
				{
					var addWorkInfo = `${additionalworks[i]['Work_Name']} x${additionalworks[i]['Type_Of_Work_Amount']} (${normalizeCost(additionalworks[i]['Total_Addworks'])} ₽)`;
					Create('div', 'personal-data-value', additionalWorks, addWorkInfo);
					total_price_int+= parseInt(additionalworks[i]['Total_Addworks']);
 				}
			}
 
			Create("div", "personal-data-value-total", tot_cost, normalizeCost(total_price_int) + ' ₽');
 
			var buttons = Create('div', 'buttons', body);
			var setOrder = Create('supp_button', null, buttons, 'Подтвердить заказ');
			var del = Create('ref', null, buttons, 'Удалить дополнительные работы');
			del.onclick = function() {
				while (additionalworks.length) {
					additionalworks.pop();
				}
				closeUmodal();
				$(confirm.onclick);
			};
 
			setOrder.onclick = function () {
				GetRequest(`/scripts/setOrderWithAddworks.php?id=${project_id} & addworks=${encodeURIComponent(JSON.stringify(additionalworks))}`, function(data) {
					if (data['status'] == 'ok'){
						closeUmodal();
						$(showUsersData).click();
					}
					notification('Информация', data['msg']);
				});
			}
		}
	});
}
