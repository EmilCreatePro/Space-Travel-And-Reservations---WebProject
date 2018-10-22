function compute_weight(t)
{
	var u=t.wt.value;
      	u>0&&(t.outputmrc.value=int_zero(10*u*.378)/10,t.outputvn.value=int_zero(10*u*.907)/10,t.outputmoon.value=int_zero(10*u*.166)/10,t.outputmars.value=int_zero(10*u*.377)/10,t.outputjp.value=int_zero(10*u*2.528)/10,t.outputsat.value=int_zero(10*u*1.064)/10,t.outputur.value=int_zero(10*u*.889)/10,t.outputnpt.value=int_zero(10*u*1.125)/10,t.outputplt.value=int_zero(10*u*.067)/10,t.outputj2.value=int_zero(100*u*.1264)/100,t.outputj3.value=int_zero(100*u*.13358)/100,t.outputj4.value=int_zero(100*u*.1448)/100,t.outputj5.value=int_zero(100*u*.18355)/100,t.outputsun.value=int_zero(10*u*27.072)/10,t.outputwd.value=int_zero(10*u*13e5)/10,t.outputns.value=14e10*u)
}
      
function int_zero(t)
{
      	return 1>t?0:parseInt(t,10)
}