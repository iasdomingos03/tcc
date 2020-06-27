$('.cep').mask('00000-000');
$('.telefone').mask('(99)9999-9999');
$('.cnpj').mask('00.000.000/0000-00', {reverse: true});
$('.cpf').mask('000.000.000-00', {reverse: true});

var cel = function (val) {
return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
spOptions = {
onKeyPress: function(val, e, field, options) {
field.mask(cel.apply({}, arguments), options);
}
};
$('.sp_celphones').mask(cel, spOptions);